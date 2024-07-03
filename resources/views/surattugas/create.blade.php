@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Surat Tugas</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/surattugas" class="mb-5" enctype="multipart/form-data">
        @csrf      
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nomor" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required autofocus value="{{ old('nomor') }}">
                @error('nomor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="dosen" class="form-label">Nama Dosen</label>
                <select class="form-select" name="dosen_id">
                    @foreach ($dosen as $d)
                    <option value="{{ $d->id }}" {{ old('dosen_id') == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="peran" class="form-label">Peran Dosen</label>
                <select class="form-select" name="peran_id">
                    @foreach ($peran as $p)
                    <option value="{{ $p->id }}" {{ old('peran_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_peran }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tanggal" class="form-label">Tanggal Surat Dibuat</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-8">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" required value="{{ old('keterangan') }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="waktu_awal" class="form-label">Waktu Awal Pelaksanaan</label>
                <input type="date" class="form-control @error('waktu_awal') is-invalid @enderror" id="waktu_awal" name="waktu_awal" required value="{{ old('waktu_awal') }}">
                @error('waktu_awal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="waktu_akhir" class="form-label">Waktu Akhir Pelaksanaan</label>
                <input type="date" class="form-control @error('waktu_akhir') is-invalid @enderror" id="waktu_akhir" name="waktu_akhir" required value="{{ old('waktu_akhir') }}">
                @error('waktu_akhir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="bukti" class="form-label">Bukti Surat</label>
                <select class="form-select" name="bukti_id">
                    @foreach ($bukti as $b)
                    <option value="{{ $b->id }}" {{ old('bukti_id') == $b->id ? 'selected' : '' }}>{{ $b->nama_bukti }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="jenis" class="form-label">Jenis Surat</label>
                <select class="form-select" id="jenis" name="jenis_id">
                    @foreach ($jenis as $j)
                    <option value="{{ $j->id }}" {{ old('jenis_id') == $j->id ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="publikasi" class="form-label">Jenis Publikasi</label>
                <select class="form-select" name="publikasi_id">
                    @foreach ($publikasi as $p)
                    <option value="{{ $p->id }}" {{ old('publikasi_id') == $p->id ? 'selected' : '' }}>{{ $p->jenis_publikasi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="akreditasi" class="form-label">Akreditasi Surat</label>
                <select class="form-select @error('akreditasi') is-invalid @enderror" id="akreditasi" name="akreditasi" required>
                    <option value="">Pilih Akreditasi Surat</option>
                    <option value="S1" {{ old('akreditasi') == 'S1' ? 'selected' : '' }}>S1</option>
                    <option value="S2" {{ old('akreditasi') == 'S2' ? 'selected' : '' }}>S2</option>
                    <option value="S3" {{ old('akreditasi') == 'S3' ? 'selected' : '' }}>S3</option>
                    <option value="S4" {{ old('akreditasi') == 'S4' ? 'selected' : '' }}>S4</option>
                    <option value="S5" {{ old('akreditasi') == 'S5' ? 'selected' : '' }}>S5</option>
                    <option value="S6" {{ old('akreditasi') == 'S6' ? 'selected' : '' }}>S6</option>
                </select>
                @error('akreditasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="tingkat" class="form-label">Tingkatan Surat</label>
                <select class="form-select" name="tingkat_id">
                    @foreach ($tingkat as $t)
                    <option value="{{ $t->id }}" {{ old('tingkat_id') == $t->id ? 'selected' : '' }}>{{ $t->nama_tingkat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Surat Tugas</button>
    </form>
</div>

@endsection
