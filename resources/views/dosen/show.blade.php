@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="my-3">Dosen</h4>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success')}}
        </div>
        @endif
        <form action="/dosen" method="GET" class="d-flex align-items-center">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        
                @if ($dosen->count())
                <div class="table-responsive small">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dosen as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="/dosen?dosen_id={{ $d->id }}" class="detail-dosen text-decoration-none text-dark {{ request('dosen_id') == $d->id ? 'fw-bold' : '' }}">{{ $d->nama }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center fs-4">Data Tidak Ditemukan.</p>
                @endif
            </div>
    </div>
</div>
@endsection
