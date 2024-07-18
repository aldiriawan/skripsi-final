@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-3">{{ $title }} (
        @if($selectedTingkat)
            @if($selectedTingkat === 'Lokal')
                Jurnal Lokal
            @elseif($selectedTingkat === 'Nasional')
                Jurnal Nasional
            @elseif($selectedTingkat === 'Internasional')
                Jurnal Internasional
            @elseif($selectedTingkat === 'Sinta 1')
                Sinta 1
            @elseif($selectedTingkat === 'Sinta 2')
                Sinta 2
            @elseif($selectedTingkat === 'Sinta 3')
                Sinta 3
            @elseif($selectedTingkat === 'Sinta 4')
                Sinta 4
            @elseif($selectedTingkat === 'Sinta 5')
                Sinta 5
            @elseif($selectedTingkat === 'Sinta 6')
                Sinta 6
            @else
                {{ $selectedTingkat }}
            @endif
        @else
        @endif )
    </h3>
    <div class="btn-group">
        @php
            $selectedTingkat = request('tingkat') ?? 'Semua Tingkatan';
            $buttonLabel = $selectedTingkat !== 'Semua Tingkatan' ? $selectedTingkat : 'Semua Tingkatan';
        @endphp
        <button type="button" class="btn btn-secondary dropdown-toggle mx-1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $buttonLabel }}
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/publikasi?tingkat=Semua Tingkatan">Semua Tingkatan</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Lokal">Jurnal Lokal</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Nasional">Jurnal Nasional</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Internasional">Jurnal Internasional</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 1">Sinta 1</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 2">Sinta 2</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 3">Sinta 3</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 4">Sinta 4</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 5">Sinta 5</a></li>
            <li><a class="dropdown-item" href="/publikasi?tingkat=Sinta 6">Sinta 6</a></li>
        </ul>
    </div>
    
</div>

<form method="GET" action="/publikasi">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
</form>

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
                <th scope="col" class="judul-col">Judul</th>
                <th scope="col">Penulis Dosen</th>
                <th scope="col">Tingkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surattugas as $s)
            <tr>
                <td class="judul-col">{{ $s->keterangan }}</td>
                <td>{{ $s->penulis_dosen }}</td>
                <td>{{ $s->nama_tingkat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $surattugas->links() }}
</div>
@else
<p class="text-center fs-4">Data tidak ditemukan.</p>
@endif

<style>
    .custom-table {
        font-size: 15px; /* Mengurangi ukuran font lebih kecil lagi */
    }
    .custom-table th, .custom-table td {
        padding: 0.5rem; /* Mengurangi padding */
        vertical-align: middle; /* Menyelaraskan teks di tengah secara vertikal */
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
    .judul-col {
        white-space: normal; /* Mengizinkan pembungkusan teks */
        word-wrap: break-word; /* Memungkinkan pemotongan kata jika terlalu panjang */
    }
    h2, p {
        margin-bottom: 1rem;
    }
</style>

@endsection
