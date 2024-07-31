@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-3">{{ $title }}</h3>
    <form action="/surattugas/import" method="post" enctype="multipart/form-data" class="d-flex align-items-center">
        @csrf
        <div class="input-group">
            <input type="file" class="form-control-file" name="import_file">
            <button type="submit" class="btn btn-primary btn-sm">Import</button>
        </div>
    </form>
    <a href="/surattugas/create" class="btn btn-primary">Tambah Surat Tugas Baru</a>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-5" role="alert">
    {{ session('success')}}
</div>
@endif

<form action="{{ route('surattugas.index') }}" method="GET" class="form-inline">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
</form>
@if ($surattugas->count())
    <div class="table-responsive">
        <table class="table table-striped table-sm custom-table">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 15%;">Nomor Surat</th>
                    <th style="width: 25%;">Nama Dosen</th>
                    <th style="width: 15%;">Tanggal Dibuat</th>
                    <th style="width: 35%;">Keterangan</th>
                    <th style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surattugas as $s)
                    <tr>
                        <td>{{ $s['nomor'] }}</td>
                        <td>{{ $s['nama_dosen'] }}</td>
                        <td>{{ $s['tanggal'] }}</td>
                        <td>{{ $s['keterangan'] }}</td>
                        <td class="text-center">
                            <a href="/surattugas/{{ $s['id'] }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Menampilkan pagination links -->
        <div class="d-flex">
            {{ $surattugas->links() }}
        </div>
    </div>
@else
<tr>
    <td colspan="5" class="text-center">Tidak ada data.</td>
</tr>
@endif


@endsection

@push('styles')
<style>
    .custom-table {
        font-size: 14px; /* Ukuran font tabel lebih besar */
        border-collapse: collapse; /* Menggabungkan garis tabel */
        width: 100%; /* Lebar tabel penuh */
    }
    .custom-table th, .custom-table td {
        padding: 10px; /* Padding sel dalam tabel */
        text-align: left; /* Teks rata kiri dalam sel */
    }
    .custom-table th {
        background-color: #343a40; /* Warna latar header */
        color: #fff; /* Warna teks header */
    }
    .custom-table .btn {
        font-size: 12px; /* Ukuran font tombol */
        padding: 0.3rem 0.6rem; /* Padding tombol */
    }
    .input-group .form-control-file {
        font-size: 12px; /* Ukuran font input file */
    }
    .input-group .btn {
        font-size: 12px; /* Ukuran font tombol */
    }
    .d-flex .btn {
        margin: 0 1px; /* Jarak antar tombol */
    }
</style>
@endpush