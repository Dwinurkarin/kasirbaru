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
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid  @enderror" />
            
                    @error('name') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="form-lable"> Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid  @enderror" />
            
                    @error('email') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="peran" class="form-lable"> Peran <span class="text-danger">*</span></label>
                    <input type="text" name="peran" id="peran" value="{{ old('peran') }}" class="form-control @error('peran') is-invalid  @enderror" />
            
                    @error('peran') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
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