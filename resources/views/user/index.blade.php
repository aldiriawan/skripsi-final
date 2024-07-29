@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h3 class="my-3">{{ $title }}</h3>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
</div>
@endif

@if (auth()->check())
<div class="card col-lg-8 mx-auto my-4 custom-card shadow">
    <div class="card-body">
        <h5 class="card-title mb-4 text-center">Detail Pengguna</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-person-fill me-2"></i><strong>Nama:</strong> {{ auth()->user()->name }}</li>
            <li class="list-group-item"><i class="bi bi-person-badge me-2"></i><strong>Username:</strong> {{ auth()->user()->username }}</li>
            <li class="list-group-item"><i class="bi bi-envelope-fill me-2"></i><strong>Email:</strong> {{ auth()->user()->email }}</li>
        </ul>
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    <div class="btn-group" role="group">
        <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn btn-warning btn-sm mx-2"><i class="bi bi-pencil"></i> Edit</a>
    </div>
</div>

@endif

@endsection
