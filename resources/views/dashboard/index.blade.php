@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-6">
        <!-- Bagian kiri atas: Grafik Pie dan Grafik Garis Lurus -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Komposisi Beban Dosen</h4>
                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Tahun
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/#">2021</a></li>
                            <li><a class="dropdown-item" href="/#">2022</a></li>
                            <li><a class="dropdown-item" href="/#">2023</a></li>
                            <li><a class="dropdown-item" href="/#">2024</a></li>
                        </ul>
                    </div>
                </div>
                <canvas id="pieChart" style="max-height: 300px;"></canvas>
            </div>
            <div class="col-md-12">
                <h4 class="my-3">Grafik Garis Lurus</h4>
                <svg height="100" width="100%">
                    <line x1="0" y1="50" x2="100%" y2="50" style="stroke:rgb(0,0,0);stroke-width:2" />
                </svg>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Bagian kanan: Grafik Batang dan List -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Kinerja Dosen per Tahun</h4>
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Grafik Pie 1</h4>
                    <h4 class="my-3">Grafik Pie 2</h4>
                    <a href="/publikasi" class="btn btn-primary btn-sm">Detail</a>
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
                <h4 class="my-3">List</h4>
                <ul>
                    <li>Data 1</li>
                    <li>Data 2</li>
                    <li>Data 3</li>
                    <!-- Tambahkan item list lainnya sesuai kebutuhan -->
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

<script>
    // Data dummy untuk grafik batang
    var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
    var data = [65, 59, 80, 81, 56, 55];

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

    // Data dummy untuk grafik pie
    var pieData = {
        labels: ['Teaching', 'Research', 'Community Service'],
        datasets: [{
            data: [300, 50, 100],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    };

    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: pieData
    });

    var ctxPie1 = document.getElementById('pieChart1').getContext('2d');
    var pieChart1 = new Chart(ctxPie1, {
        type: 'pie',
        data: pieData
    });

    var ctxPie2 = document.getElementById('pieChart2').getContext('2d');
    var pieChart2 = new Chart(ctxPie2, {
        type: 'pie',
        data: pieData
    });
</script>
@endpush
