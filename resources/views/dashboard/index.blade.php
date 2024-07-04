@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Komposisi Beban Dosen</h4>
                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            2024
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/#">2022</a></li>
                            <li><a class="dropdown-item" href="/#">2023</a></li>
                            <li><a class="dropdown-item" href="/#">2024</a></li>
                        </ul>
                    </div>
                </div>
                <canvas id="pieChart" style="max-height: 300px;"></canvas>
            </div>
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Dosen dengan Beban Terbesar</h4>
                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            2024
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/#">2022</a></li>
                            <li><a class="dropdown-item" href="/#">2023</a></li>
                            <li><a class="dropdown-item" href="/#">2024</a></li>
                        </ul>
                    </div>
                </div>
                <canvas id="barChartTopDosen" style="max-height: 300px;"></canvas>
                <h4 class="my-3">Dosen dengan Beban Terendah</h4>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Kinerja Dosen per Tahun</h4>
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('barChart').getContext('2d');
        
            var labels = @json($years);
            var pengabdianData = @json($pengabdianData);
            var penunjangData = @json($penunjangData);
            var penelitianData = @json($penelitianData);
            var pengajaranData = @json($pengajaranData);
        
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pengabdian',
                            data: pengabdianData,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Penunjang',
                            data: penunjangData,
                            backgroundColor: 'rgba(255, 206, 86, 0.6)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Penelitian',
                            data: penelitianData,
                            backgroundColor: 'rgba(153, 102, 255, 0.6)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Pengajaran',
                            data: pengajaranData,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Scope Kegiatan</h4>
                    <h4 class="my-3">Publikasi</h4>
                    <a href="/publikasi" class="btn btn-secondary">Detail</a>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <canvas id="pieChart1" style="max-height: 150px;"></canvas>
                    </div>
                    <div class="col-md-6 mb-3">
                        <canvas id="pieChart2" style="max-height: 150px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="my-3">ST/SK Berakhir</h4>
                <ul>
                    <li>Data 1</li>
                    <li>Data 2</li>
                    <li>Data 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/js/dashboard.js"></script>
@endpush
