@extends('layouts.main')

@section('container')
<div class="card mt-2">
    <div class="card-header">
        <h3>{{ $title }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nomor Surat :</strong> {{ $suratTugas->nomor ?? '[-]' }}</p>
                <p><strong>Tanggal Surat Dibuat :</strong> {{ \Carbon\Carbon::parse($suratTugas->tanggal)->locale('id')->translatedFormat('d F Y') ?? '[-]' }}</p>
                <p><strong>Waktu Awal :</strong> {{ \Carbon\Carbon::parse($suratTugas->waktu_awal)->locale('id')->translatedFormat('d F Y') ?? '[-]' }}</p>
                <p><strong>Waktu Akhir :</strong> {{ \Carbon\Carbon::parse($suratTugas->waktu_akhir)->locale('id')->translatedFormat('d F Y') ?? '[-]' }}</p>
                <p><strong>Keterangan :</strong> {{ $suratTugas->keterangan ?? '[-]' }}</p>
                <p><strong>Nama Dosen :</strong></p>
                <ul>
                    @foreach($allDosen as $dosen)
                        <li>{{ $dosen->nama }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <p><strong>Bukti :</strong> {{ optional($suratTugas->bukti)->nama_bukti ?? '[-]' }}</p>
                <p><strong>Jenis :</strong> {{ optional($suratTugas->jenis)->nama_jenis ?? '[-]' }}</p>
                <p><strong>Peran :</strong> {{ optional($suratTugas->peran)->nama_peran ?? '[-]' }}</p>
                <p><strong>Akreditasi :</strong> {{ optional($suratTugas->akreditasi)->nama_akreditasi ?? '[-]' }}</p>
                <p><strong>Publikasi :</strong> {{ optional($suratTugas->publikasi)->nama_publikasi ?? '[-]' }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-left mt-4">
            <div class="btn-group rounded-buttons" role="group">
                <a href="/surattugas" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                <a href="/surattugas/{{ $suratTugas->id }}/edit" class="btn btn-warning btn-sm mx-2"><i class="bi bi-pencil"></i> Edit</a>
                <form action="/surattugas/{{ $suratTugas->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
