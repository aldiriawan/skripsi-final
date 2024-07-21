@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1>{{ $title }}</h1>
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="/user/{{ auth()->user()->id }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" id="username" class="form-control" value="{{ old('username', auth()->user()->username) }}" required>
            @error('username')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Tambahkan field lain jika diperlukan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
