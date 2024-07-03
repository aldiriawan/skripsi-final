@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    <a href="/surattugas/create" class="btn btn-primary">Tambah Data Surat</a>
</div>
@endsection