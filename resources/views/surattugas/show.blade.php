@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h3>{{ $title }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nomor Surat:</strong> {{ $suratTugas->nomor ?? '[-]' }}</p>
                <p><strong>Nama Dosen:</strong> {{ optional($suratTugas->dosen)->nama ?? '[-]' }}</p>
                <p><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($suratTugas->tanggal)->format('d M Y') ?? '[-]' }}</p>
                <p><strong>Keterangan:</strong> {{ $suratTugas->keterangan ?? '[-]' }}</p>
                <p><strong>Waktu Awal:</strong> {{ \Carbon\Carbon::parse($suratTugas->waktu_awal)->format('d M Y') ?? '[-]' }}</p>
                <p><strong>Waktu Akhir:</strong> {{ \Carbon\Carbon::parse($suratTugas->waktu_akhir)->format('d M Y') ?? '[-]' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Bukti:</strong> {{ optional($suratTugas->bukti)->nama ?? '[-]' }}</p>
                <p><strong>Jenis:</strong> {{ optional($suratTugas->jenis)->nama ?? '[-]' }}</p>
                <p><strong>Tingkat:</strong> {{ optional($suratTugas->tingkat)->nama ?? '[-]' }}</p>
                <p><strong>Peran:</strong> {{ optional($suratTugas->peran)->nama ?? '[-]' }}</p>
                <p><strong>Publikasi:</strong> {{ optional($suratTugas->publikasi)->nama ?? '[-]' }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="/surattugas/{{ $suratTugas->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="/surattugas/{{ $suratTugas->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
