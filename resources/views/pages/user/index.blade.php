@extends('template')
@section('judul','Daftar Pengguna')
@section('konten')
    <div class="page-heading">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
            <span class="bi bi-plus-circle"></span> Tambah Pengguna
        </a>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="bi bi-pencil"></i>

                                        </a>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                                <i class="bi bi-trash"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
