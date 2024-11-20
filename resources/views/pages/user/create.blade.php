@extends('template')

@section('konten')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Create New - Pengguna
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-lable"> Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid  @enderror" />

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-lable"> Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="name" value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid  @enderror" />

                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name" class="form-lable"> Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid  @enderror" />

                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="role" class="form-label">Pilih Role Pengguna</label>
                            <select id="role" class="form-select @error('role') is-invalid @enderror" name="role"
                                required>
                                <option value="pilih" selected disabled>Pilih</option>
                                <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>kasir</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
