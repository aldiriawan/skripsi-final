@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="my-3">Dosen</h3>
            <div class="btn-group">
                @php
                    $selectedProgramStudi = request('program_studi');
                    $buttonLabel = $selectedProgramStudi ? $selectedProgramStudi : 'Pilih Program Studi';
                @endphp
                <button type="button" class="btn btn-secondary dropdown-toggle mx-1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $buttonLabel }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dosen?program_studi=Informatika">Informatika</a></li>
                    <li><a class="dropdown-item" href="/dosen?program_studi=Sistem%20Informasi">Sistem Informasi</a></li>
                </ul>
                <a href="/dosen/create" class="btn btn-primary"><i class="bi bi-plus"></i></a>
            </div>
        </div>
        
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success')}}
        </div>
        @endif

        @if ($dosen->count())
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="/dosen?dosen_id={{ $d->id }}" class="detail-dosen text-decoration-none text-dark {{ request('dosen_id') == $d->id ? 'fw-bold' : '' }}">{{ $d->nama }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center fs-4">No Data Found.</p>
        @endif
    </div>

    <div class="col-md-8">
        @if ($selectedDosen)
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mt-3">{{ $selectedDosen->nama }}</h4>
                    <div class="d-flex">
                        <a href="/dosen/{{ $selectedDosen->id }}/edit" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="/dosen/{{ $selectedDosen->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah Anda yakin?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <hr></hr>
                <!-- Grafik Batang -->
                <h5 class="text-center">Kinerja Dosen Pertahun</h5>
                <canvas id="barChart" style="max-height: 200px; max-width: auto"></canvas>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    @php
                        $selectedYear = request('tahun', date('Y'));
                    @endphp
                    <h4 class="mb-0">Publikasi</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $selectedYear }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach (range(2021, 2024) as $year)
                                <li><a class="dropdown-item" href="/dosen?dosen_id={{ request('dosen_id') }}&tahun={{ $year }}">{{ $year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <table class="table table-small table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Jurnal Nasional</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tingkatSuratCounts as $tingkat => $count)
                                <tr>
                                    <td>{{ $tingkat }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-md-3">
                        <!-- Tabel Jurnal Internasional -->
                        <div class="table-responsive">
                            <table class="table table-small table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Internasional</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p><strong>Jurnal Nasional:</strong> {{ $jumlahPublikasiNasional }}</p>
                            <p><strong>Jurnal Internasional:</strong> {{ $jumlahPublikasiInternasional }}</p>
                            <p><strong>Jumlah HKI:</strong> {{ $jumlahHKI }}</p>
                            <p><strong>Jumlah Paten:</strong></p>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="col-md-12">
                <!-- List -->
                <h4>Penunjang</h4>
                <ul>
                    @foreach ($penunjang as $data)
                        <div class="d-flex align-items-center mb-2">
                            <!-- Indikator bulat -->
                            @php
                                $waktu_akhir = \Carbon\Carbon::parse($data->waktu_akhir);
                                $now = now();
                            @endphp
            
                            <div class="indicator 
                                @if($waktu_akhir > $now->addDays(7)) 
                                    bg-success 
                                @elseif($waktu_akhir > $now->addDays(2)) 
                                    bg-warning 
                                @else 
                                    bg-danger 
                                @endif">
                            </div>
                            <!-- Keterangan -->
                            <div>
                                {{ $data->keterangan }} - {{ \Carbon\Carbon::parse($data->waktu_awal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($data->waktu_akhir)->format('d M Y') }}
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            
            
        </div>
        @endif
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data dummy untuk grafik batang
            var labels = ['2021', '2022', '2023', '2024'];
            var data = [15, 14, 13, 6, 5, 12];

            // Mendapatkan konteks dari elemen canvas
            var ctx = document.getElementById('barChart').getContext('2d');

            // Membuat objek grafik batang
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // Label di sumbu x
                    datasets: [{
                        label: 'Kinerja Dosen per Tahun',
                        data: data, // Data untuk grafik batang
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang batang
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna border batang
                        borderWidth: 1 // Lebar border batang
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Mulai sumbu y dari 0
                        }
                    }
                }
            });
        </script>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

<style>
    .indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 10px;
        display: inline-block;
    }
    .bg-success {
        background-color: green !important;
    }
    .bg-warning {
        background-color: yellow !important;
    }
    .bg-danger {
        background-color: red !important;
    }
</style>


@endsection