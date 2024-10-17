@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Pengguna
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                <tr>
                    <td>Nama</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Peran</td>
                    <td>{{ $user->peran }}</td>
                </tr>
                <td>
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm me-1">
                    <span class="bi bi-arrow-left"></span>
                    Kembali
                </a>
                </td>
            </table>
            </div>
        </div>
    </section>
    
</div>
@endsection