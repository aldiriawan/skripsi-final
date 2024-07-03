@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Dosen</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dosen" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                <select class="form-select @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" required>
                    <option value="">Pilih Program Studi</option>
                    <option value="Informatika" {{ old('program_studi') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                    <option value="Sistem Informasi" {{ old('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                </select>
                @error('program_studi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Data Dosen</button>
    </form>
</div>

@endsection
