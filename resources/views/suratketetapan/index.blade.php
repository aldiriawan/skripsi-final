@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between align-items-center">
    <h3 class="my-3">{{ $title }}</h3>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $selectedYear }}
        </button>
        <ul class="dropdown-menu">
            @foreach ($years as $year)
                <li>
                    <a class="dropdown-item" href="{{ route('suratketetapan.index', ['tahun' => $year, 'search' => request('search')]) }}">
                        {{ $year }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('suratketetapan.index') }}" method="GET" class="form-inline">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="hidden" name="tahun" value="{{ $selectedYear }}">
                <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Surat Tugas / Surat Ketetapan</th>
            <th scope="col">Mulai</th>
            <th scope="col">Selesai</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($suratTugas as $data)
            <tr>
                <td>
                    <!-- Indikator bulat -->
                    @php
                        $waktu_akhir = \Carbon\Carbon::parse($data->waktu_akhir);
                        $now = now();
                        $colorClass = $waktu_akhir->isFuture() ? 
                            ($waktu_akhir->lessThanOrEqualTo($now->copy()->addDays(7)) ? 'bg-warning' : 'bg-success') :
                            'bg-danger';
                    @endphp
                    <div class="indicator {{ $colorClass }}"></div>
                </td>
                <td>{{ $data->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($data->waktu_awal)->locale('id')->translatedFormat('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($data->waktu_akhir)->locale('id')->translatedFormat('d F Y') }}</td>
                <td>
                    <!-- Checkbox untuk visibilitas -->
                    <form action="/surat_tugas/{{ $data->id }}/toggle-visibility" method="post" class="ms-auto">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" name="visibility" onchange="this.form.submit()" {{ $data->visibility ? 'checked' : '' }}>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
