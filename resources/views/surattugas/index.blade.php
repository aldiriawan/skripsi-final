@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="my-3">Daftar Surat Tugas</h3>
    <form action="/surattugas/import" method="post" enctype="multipart/form-data" class="d-flex align-items-center">
        @csrf
        <div class="input-group">
            <input type="file" class="form-control-file" name="import_file">
            <button type="submit" class="btn btn-primary btn-sm">Import</button>
        </div>
    </form>
    <a href="/surattugas/create" class="btn btn-primary btn-sm">Tambah Surat Tugas Baru</a>
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
                <th scope="col">Tanggal Surat Dibuat</th>
                <th scope="col">Keterangan</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surattugas as $s)
            <tr>
                <td>{{ $s->nomor }}</td>
                <td>{{ $s->dosen ? $s->dosen->nama : 'Dosen tidak ditemukan' }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d M Y') }}</td>
                <td>{{ $s->keterangan }}</td>
                <td class="text-center">
                    <a href="/surattugas/{{ $s->id }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Menampilkan pagination links -->
    <div class="d-flex justify-content-center">
        {{ $surattugas->links() }}
    </div>
</div>
@else
<p class="text-center fs-4">Data tidak ditemukan.</p>
@endif

@endsection

@push('styles')
<style>
    .custom-table {
        font-size: 12px; /* Ukuran font tabel lebih kecil */
    }
    .custom-table th, .custom-table td {
        padding: 8px; /* Padding lebih kecil */
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
