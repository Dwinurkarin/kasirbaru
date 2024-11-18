<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index');
    }

    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        return view('pages.user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
