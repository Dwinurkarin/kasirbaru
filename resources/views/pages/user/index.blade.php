@extends('template')

@section('konten')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Pengguna
            </h3>
        </div>

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
                                <th>Peran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->peran }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary btn-sm me-1">
                                            <span class="bi bi-eye"></span>
                                            Show
                                        </a>
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                                            <span class="bi bi-pencil"></span>
                                            Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</button>
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
