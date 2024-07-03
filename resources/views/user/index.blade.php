@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-3">Data User</h2>
    <a href="/" class="btn btn-secondary">Kembali</a>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
</div>
@endif
<a href="/dosen/create" class="btn btn-primary">Tambah Data Dosen</a>
@if (auth()->check())
<div class="card col-lg-8">
    <div class="card-body">
        <h5 class="card-title">Detail Pengguna</h5>
        <p class="card-text">Nama: {{ auth()->user()->name }}</p>
        <p class="card-text">Username: {{ auth()->user()->username }}</p>
        <p class="card-text">Email: {{ auth()->user()->email }}</p>
    </div>
</div>
@endif

@endsection
