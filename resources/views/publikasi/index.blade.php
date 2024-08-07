@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-3">{{ $title }} (
        @if($selectedAkreditasi)
            @if($selectedAkreditasi === 'Nasional')
                Jurnal Nasional
            @elseif($selectedAkreditasi === 'Internasional')
                Jurnal Internasional
            @elseif($selectedAkreditasi === 'Sinta 1')
                Sinta 1
            @elseif($selectedAkreditasi === 'Sinta 2')
                Sinta 2
            @elseif($selectedAkreditasi === 'Sinta 3')
                Sinta 3
            @elseif($selectedAkreditasi === 'Sinta 4')
                Sinta 4
            @elseif($selectedAkreditasi === 'Sinta 5')
                Sinta 5
            @elseif($selectedAkreditasi === 'Sinta 6')
                Sinta 6
            @else
                {{ $selectedAkreditasi }}
            @endif
        @else
        @endif )
    </h3>
    <div class="btn-group">
        @php
            $selectedAkreditasi = request('akreditasi') ?? 'Semua Akreditasi';
            $buttonLabel = $selectedAkreditasi !== 'Semua Akreditasi' ? $selectedAkreditasi : 'Semua Akreditasi';
        @endphp
        <button type="button" class="btn btn-secondary dropdown-toggle mx-1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $buttonLabel }}
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Semua Akreditasi&search={{ request('search') }}">Semua Akreditasi</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Nasional&search={{ request('search') }}">Jurnal Nasional</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Internasional&search={{ request('search') }}">Jurnal Internasional</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 1&search={{ request('search') }}">Sinta 1</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 2&search={{ request('search') }}">Sinta 2</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 3&search={{ request('search') }}">Sinta 3</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 4&search={{ request('search') }}">Sinta 4</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 5&search={{ request('search') }}">Sinta 5</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Sinta 6&search={{ request('search') }}">Sinta 6</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Q1&search={{ request('search') }}">Q1</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Q2&search={{ request('search') }}">Q2</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Q3&search={{ request('search') }}">Q3</a></li>
            <li><a class="dropdown-item" href="/publikasi?akreditasi=Q4&search={{ request('search') }}">Q4</a></li>
        </ul>
    </div>
    
</div>

<form method="GET" action="/publikasi">
    <input type="hidden" name="akreditasi" value="{{ request('akreditasi') }}">
    <div class="row mb-3">
        <div class="col-md-5">
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
                <th scope="col">Akreditasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surattugas as $s)
            <tr>
                <td class="judul-col">{{ $s->keterangan }}</td>
                <td>{{ $s->penulis_dosen }}</td>
                <td>{{ $s->nama_akreditasi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $surattugas->appends(['akreditasi' => $selectedAkreditasi, 'search' => $search])->links() }}
</div>
@else
<tr>
    <td colspan="5" class="text-center">Tidak ada data.</td>
</tr>
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
