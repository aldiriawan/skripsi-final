@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h3 class="my-3">{{ $title }}</h3>
</div>

@if (session('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card col-lg-8 mx-auto my-4 custom-card shadow">
    <div class="card-body">
        <h5 class="card-title mb-4 text-center">Edit Pengguna</h5>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                @error('username')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="/user" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i>Kembali</a>
        </form>
    </div>
</div>
@endsection
