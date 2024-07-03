@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-3">Data ST/SK</h2>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
</div>
@endif



@endsection
