@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Edit Surat Tugas</h3>
</div>

<div class="col-lg-10">
    <form method="post" action="/surattugas/{{ $suratTugas->id }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="nomor" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required value="{{ old('nomor', $suratTugas->nomor) }}">
                @error('nomor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tanggal" class="form-label">Tanggal Surat Dibuat</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal', $suratTugas->tanggal) }}">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="waktu_awal" class="form-label">Waktu Awal Pelaksanaan</label>
                <input type="date" class="form-control @error('waktu_awal') is-invalid @enderror" id="waktu_awal" name="waktu_awal" required value="{{ old('waktu_awal', $suratTugas->waktu_awal) }}">
                @error('waktu_awal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="waktu_akhir" class="form-label">Waktu Akhir Pelaksanaan</label>
                <input type="date" class="form-control @error('waktu_akhir') is-invalid @enderror" id="waktu_akhir" name="waktu_akhir" required value="{{ old('waktu_akhir', $suratTugas->waktu_akhir) }}">
                @error('waktu_akhir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="bukti" class="form-label">Bukti Surat</label>
                <select class="form-select" name="bukti_id">
                    @foreach ($bukti as $b)
                    <option value="{{ $b->id }}" {{ old('bukti_id', $suratTugas->bukti_id) == $b->id ? 'selected' : '' }}>{{ $b->nama_bukti }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="jenis" class="form-label">Jenis Surat</label>
                <select class="form-select" id="jenis" name="jenis_id">
                    @foreach ($jenis as $j)
                    <option value="{{ $j->id }}" {{ old('jenis_id', $suratTugas->jenis_id) == $j->id ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="publikasi" class="form-label">Jenis Publikasi</label>
                <select class="form-select" name="publikasi_id">
                    @foreach ($publikasi as $p)
                    <option value="{{ $p->id }}" {{ old('publikasi_id', $suratTugas->publikasi_id) == $p->id ? 'selected' : '' }}>{{ $p->nama_publikasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="akreditasi" class="form-label">Akreditasi Surat</label>
                <select class="form-select" name="akreditasi_id">
                    @foreach ($akreditasi as $t)
                    <option value="{{ $t->id }}" {{ old('akreditasi_id', $suratTugas->akreditasi_id) == $t->id ? 'selected' : '' }}>{{ $t->nama_akreditasi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-8">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" required style="width: 100%; height: 100px;">{{ old('keterangan', $suratTugas->keterangan) }}</textarea>
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="peran" class="form-label">Peran Dosen</label>
                <select class="form-select" name="peran_id">
                    @foreach ($peran as $p)
                    <option value="{{ $p->id }}" {{ old('peran_id', $suratTugas->peran_id) == $p->id ? 'selected' : '' }}>{{ $p->nama_peran }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="dosen-container" class="row mb-3">
            @foreach ($sameKeteranganSuratTugas as $st)
            <div class="col-md-4 dosen-field">
                <label for="dosen_id" class="form-label">Dosen</label>
                <div class="input-group">
                    <select class="form-select" name="dosen_id[]">
                        @foreach ($dosenList as $d)
                        <option value="{{ $d->id }}" {{ $st->dosen_id == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger remove-dosen-button">-</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-success" id="add-dosen-button">+ Dosen</button>
        <button type="submit" class="btn btn-primary">Update Surat Tugas</button>
        <a href="/surattugas" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    document.getElementById('add-dosen-button').addEventListener('click', function() {
        var dosenContainer = document.getElementById('dosen-container');
        var newDosenField = document.createElement('div');
        newDosenField.classList.add('col-md-4', 'dosen-field');
        newDosenField.innerHTML = `
            <label for="dosen_id" class="form-label">Dosen</label>
            <div class="input-group">
                <select class="form-select" name="dosen_id[]">
                    @foreach ($dosenList as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger remove-dosen-button">-</button>
            </div>
        `;
        dosenContainer.appendChild(newDosenField);

        newDosenField.querySelector('.remove-dosen-button').addEventListener('click', function() {
            dosenContainer.removeChild(newDosenField);
        });
    });

    document.querySelectorAll('.remove-dosen-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var dosenField = button.closest('.dosen-field');
            dosenField.parentNode.removeChild(dosenField);
        });
    });
</script>
@endsection
