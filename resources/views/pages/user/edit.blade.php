@extends('template')

@section('konten')
<div class="page-heading">
    <div class="page-title mb-3">
       <h3>
           <span class="bi bi-building"></span>
           Edit New - User
       </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror" />
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="form-label">Pilih Role Pengguna</label>
                        <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="" {{ old('role', $user->role) === null ? 'selected' : '' }}>Kosongkan</option>
                            <option value="kasir" {{ old('role', $user->role) == 'kasir' ? 'selected' : '' }}>kasir</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>
    </section>

</div>
@endsection
