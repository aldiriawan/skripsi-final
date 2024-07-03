@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="my-3">Data Surat Tugas</h3>
    <form action="/surattugas/import" method="post" enctype="multipart/form-data" class="d-flex align-items-center">
        @csrf
        <div class="input-group">
            <input type="file" class="form-control-file" name="import_file">
            <button type="submit" class="btn btn-primary btn-sm">Import</button>
        </div>
    </form>
    <a href="/surattugas/create" class="btn btn-primary btn-sm">Tambah Data Surat</a>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success')}}
</div>
@endif

@if ($surattugas->count())
<div class="table-responsive">
    <table class="table table-striped table-sm custom-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Tanggal Pembuatan Surat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surattugas as $s)
            <tr>
                <td>{{ $s->nomor }}</td>
                <td>{{ $s->dosen ? $s->dosen->nama : 'Dosen tidak ditemukan' }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d M Y') }}</td>
                <td>{{ $s->keterangan }}</td>
                <td class="d-flex justify-content-around">
                    <a href="/surattugas/{{ $s->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="/surattugas/{{ $s->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah Anda yakin?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Menampilkan pagination links -->
    {{ $surattugas->links() }}
</div>
@else
<p class="text-center fs-4">Data tidak ditemukan.</p>
@endif

@endsection

@push('styles')
<style>
    .custom-table {
        font-size: 11px; /* Mengurangi ukuran font lebih kecil lagi */
    }
    .custom-table th, .custom-table td {
        padding: 0.2rem; /* Mengurangi padding lebih kecil lagi */
    }
    .custom-table .btn {
        font-size: 9px; /* Mengurangi ukuran font tombol lebih kecil lagi */
        padding: 0.2rem 0.4rem; /* Mengurangi padding tombol lebih kecil lagi */
    }
    .input-group .form-control-file {
        font-size: 11px; /* Mengurangi ukuran font input file */
    }
    .input-group .btn {
        font-size: 11px; /* Mengurangi ukuran font tombol */
    }
    .d-flex .btn {
        flex: 1; /* Membuat tombol memiliki ukuran yang sama */
        margin: 0 1px; /* Mengurangi jarak antar tombol */
    }
</style>
@endpush
