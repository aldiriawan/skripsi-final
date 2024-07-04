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
                        <a href="/dosen/{{ $selectedDosen->id }}/edit" class="btn btn-warning btn-sm me-2">
                            <i class="bi bi-pencil-square"></i>
                            <span class="visually-hidden">Edit</span>
                        </a>
                        <form action="/dosen/{{ $selectedDosen->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah Anda yakin?')">
                                <i class="bi bi-trash"></i>
                                <span class="visually-hidden">Delete</span>
                            </button>
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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Penunjang</h4>
                    <a href="/suratketetapan" class="btn btn-secondary">Detail</a>
                </div>
                <ul>
                    @foreach ($penunjang as $data)
                        <div class="d-flex align-items-center mb-2">
                            <!-- Indikator bulat -->
                            @php
                                $waktu_akhir = \Carbon\Carbon::parse($data->waktu_akhir);
                                $now = now();
                                $colorClass = $waktu_akhir->greaterThan($now->copy()->addDays(7)) ? 'bg-success' : ($waktu_akhir->greaterThan($now->copy()->addDays(2)) ? 'bg-warning' : 'bg-danger');
                            @endphp
                    
                            <div class="indicator {{ $colorClass }}"></div>
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
    var labels = ['2022', '2023', '2024'];
    var pengabdianData = @json($pengabdianData);
    var penunjangData = @json($penunjangData);
    var penelitianData = @json($penelitianData);
    var pengajaranData = @json($pengajaranData);

    var ctx = document.getElementById('barChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Pengabdian',
                    data: pengabdianData,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Penunjang',
                    data: penunjangData,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Penelitian',
                    data: penelitianData,
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Pengajaran',
                    data: pengajaranData,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true
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

.btn {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add shadow */
}

.btn:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Add shadow on hover */
}

</style>

@endsection
