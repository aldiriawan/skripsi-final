@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <h3 class="my-3">{{ $title }}</h3>
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $selectedYear }}
            </button>
            <ul class="dropdown-menu">
                @foreach($years as $year)
                    <li><a class="dropdown-item" href="{{ route('dashboard.index', ['year' => $year]) }}">{{ $year }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
</div>

<div class="row">
    <!-- Komposisi Beban Dosen -->
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="">Komposisi Beban Dosen</h4>
                </div>
                <canvas id="pieChart" class="small-pie-chart"></canvas>
            </div>
    
            <!-- Pie Chart Informatika -->
            <div class="col-md-6 d-flex flex-column align-items-center mb-3">
                <h8 class="mb-2">Informatika</h8>
                <canvas id="pieChartInformatika" class="smaller-pie-chart"></canvas>
            </div>
    
            <!-- Pie Chart Sistem Informasi -->
            <div class="col-md-6 d-flex flex-column align-items-center mb-3">
                <h8 class="mb-2">Sistem Informasi</h8>
                <canvas id="pieChartSistemInformasi" class="smaller-pie-chart"></canvas>
            </div>
        </div>
    </div>

    <!-- Kinerja Dosen per Tahun -->
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="mb-1 text-center">Kinerja Dosen Pertahun</h4>
                <canvas id="barChart" class="large-bar-chart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Dosen dengan Beban Terbesar dan Terendah -->
<div class="row mt-4">
    <!-- Dosen dengan Beban Terbesar dan Dosen dengan Beban Terendah -->
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Dosen dengan Beban Terbesar</h4>
                </div>
                <canvas id="topDosenChart" class="large-bar-chart"></canvas>
            </div>
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Dosen dengan Beban Terendah</h4>
                </div>
                <canvas id="bottomDosenChart" class="large-bar-chart"></canvas>
            </div>
        </div>
    </div>

    <!-- Scope Kegiatan -->
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Scope Kegiatan</h4>
                </div>
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Penelitian</h6>
                        <canvas id="penelitianChart" class="equal-size-pie-chart"></canvas>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Pengabdian</h6>
                        <canvas id="pengabdianChart" class="equal-size-pie-chart"></canvas>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Penunjang</h6>
                        <canvas id="penunjangChart" class="equal-size-pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Publikasi -->
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Publikasi</h4>
                </div>
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Jurnal Internasional</h6>
                        <canvas id="jurnalInternasionalChart" class="equal-size-pie-chart"></canvas>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Jurnal Nasional</h6>
                        <canvas id="jurnalNasionalChart" class="equal-size-pie-chart"></canvas>
                    </div>
                    <div class="col-md-4 d-flex flex-column align-items-center mb-3">
                        <h6 class="my-2">Prosiding</h6>
                        <canvas id="prosidingChart" class="equal-size-pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .small-pie-chart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
    }

    .smaller-pie-chart {
        max-width: 100px;
        max-height: 100px;
        margin: 0 auto;
    }
    .large-bar-chart {
        max-width: 100%;
        max-height: 350px;
    }

     .small-pie-chart, .large-pie-chart, .smaller-pie-chart {
        height: 200px; /* Atur tinggi yang sama */
        width: 100%; /* Atur lebar yang sama */
    }
    .large-pie-chart {
        height: 250px; /* Ukuran khusus untuk chart besar */
    }
    .smaller-pie-chart {
        height: 150px; /* Ukuran khusus untuk chart kecil */
    }

    .mb-1 {
        margin-bottom: 0.25rem !important;
    }
    .my-2 {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data for Komposisi Beban Dosen
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieData = @json($data);
        var pieLabels = ['Pengajaran', 'Penelitian', 'Pengabdian', 'Penunjang'];
        var pieCounts = [pieData[1] || 0, pieData[2] || 0, pieData[3] || 0, pieData[4] || 0];

        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieCounts,
                    backgroundColor: ['#3366CC', '#4BC0C0', '#00FF7F', '#FF6384'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 15,
                            padding: 10,
                        },
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (tooltipItem.raw !== undefined) {
                                    var percentage = (tooltipItem.raw / pieCounts.reduce((a, b) => a + b, 0) * 100).toFixed(2);
                                    label += tooltipItem.raw + ' (' + percentage + '%)';
                                }
                                return label;
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                        right: 20
                    }
                }
            },
        });

        // Data for Pie Chart Informatika
        var pieInformatikaCtx = document.getElementById('pieChartInformatika').getContext('2d');
        var pieInformatikaData = @json($dataInformatika);
        var pieInformatikaCounts = [pieInformatikaData[1] || 0, pieInformatikaData[2] || 0, pieInformatikaData[3] || 0, pieInformatikaData[4] || 0];

        var pieChartInformatika = new Chart(pieInformatikaCtx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieInformatikaCounts,
                    backgroundColor: ['#3366CC', '#4BC0C0', '#00FF7F', '#FF6384'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Menyembunyikan legenda untuk grafik pie Informatika
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (tooltipItem.raw !== undefined) {
                                    var percentage = (tooltipItem.raw / pieInformatikaCounts.reduce((a, b) => a + b, 0) * 100).toFixed(2);
                                    label += tooltipItem.raw + ' (' + percentage + '%)';
                                }
                                return label;
                            }
                        }
                    }
                }
            },
        });

        // Data for Pie Chart Sistem Informasi
        var pieSistemInformasiCtx = document.getElementById('pieChartSistemInformasi').getContext('2d');
        var pieSistemInformasiData = @json($dataSistemInformasi);
        var pieSistemInformasiCounts = [pieSistemInformasiData[1] || 0, pieSistemInformasiData[2] || 0, pieSistemInformasiData[3] || 0, pieSistemInformasiData[4] || 0];

        var pieChartSistemInformasi = new Chart(pieSistemInformasiCtx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieSistemInformasiCounts,
                    backgroundColor: ['#3366CC', '#4BC0C0', '#00FF7F', '#FF6384'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Menyembunyikan legenda untuk grafik pie Sistem Informasi
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (tooltipItem.raw !== undefined) {
                                    var percentage = (tooltipItem.raw / pieSistemInformasiCounts.reduce((a, b) => a + b, 0) * 100).toFixed(2);
                                    label += tooltipItem.raw + ' (' + percentage + '%)';
                                }
                                return label;
                            }
                        }
                    }
                }
            },
        });

        // Data for Kinerja Dosen perTahun
        var barCtx = document.getElementById('barChart').getContext('2d');
        var barLabels = @json($years);
        var pengajaranData = @json($pengajaranData);
        var penelitianData = @json($penelitianData);
        var pengabdianData = @json($pengabdianData);
        var penunjangData = @json($penunjangData);

        var barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Pengajaran',
                        data: pengajaranData,
                        backgroundColor: '#3366CC',
                        barThickness: 20,
                        categoryPercentage: 0.2,
                        barPercentage: 0.8
                    },
                    {
                        label: 'Penelitian',
                        data: penelitianData,
                        backgroundColor: '#4BC0C0',
                        barThickness: 20,
                        categoryPercentage: 0.2,
                        barPercentage: 0.8
                    },
                    {
                        label: 'Pengabdian',
                        data: pengabdianData,
                        backgroundColor: '#00FF7F',
                        barThickness: 20,
                        categoryPercentage: 0.2,
                        barPercentage: 0.8
                    },
                    {
                        label: 'Penunjang',
                        data: penunjangData,
                        backgroundColor: '#FF6384',
                        barThickness: 20,
                        categoryPercentage: 0.2,
                        barPercentage: 0.8
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
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
                        stacked: false,
                        ticks: {
                            maxRotation: 0,
                            minRotation: 0
                        },
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true
                    }
                }
            }
        });

        // Data for Dosen Terbesar
        var topDosenCtx = document.getElementById('topDosenChart').getContext('2d');
        var topDosenData = @json($topDosenData);
        var dosenNames = @json($dosenNames);
        var topDosenLabels = Object.keys(topDosenData).map(dosenId => dosenNames[dosenId]);
        var topDosenCounts = Object.values(topDosenData);

        var topDosenChart = new Chart(topDosenCtx, {
            type: 'bar',
            data: {
                labels: topDosenLabels,
                datasets: [{
                    label: 'Jumlah Surat Tugas',
                    data: topDosenCounts,
                    backgroundColor: '#FF6384',
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y', // Grafik batang menyamping
                plugins: {
                    legend: {
                        display: false,
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
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Surat Tugas'
                        }
                    },
                }
            }
        });

        // Data for Dosen Terendah
        var bottomDosenCtx = document.getElementById('bottomDosenChart').getContext('2d');
        var bottomDosenData = @json($bottomDosenData);
        var bottomDosenNames = @json($dosenNames);
        var bottomDosenLabels = Object.keys(bottomDosenData).map(dosenId => bottomDosenNames[dosenId]);
        var bottomDosenCounts = Object.values(bottomDosenData);

        var bottomDosenChart = new Chart(bottomDosenCtx, {
            type: 'bar',
            data: {
                labels: bottomDosenLabels,
                datasets: [{
                    label: 'Jumlah Surat Tugas',
                    data: bottomDosenCounts,
                    backgroundColor: '#4BC0C0',
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y', // Grafik batang menyamping
                plugins: {
                    legend: {
                        display: false,
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
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Surat Tugas'
                        }
                    },
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
    // Data for Scope Kegiatan
    const scopeKegiatanData = @json($scopeKegiatanData);
    var scopeKegiatanLabels = ['Nasional', 'Internasional'];

    // Function to create pie chart
    function createPieChart(ctx, data, labels, colors) {
        return new Chart(ctx, {
            type: 'pie',
            data: {
                labels: scopeKegiatanLabels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const total = tooltipItem.dataset.data.reduce((acc, val) => acc + val, 0);
                                const value = tooltipItem.raw;
                                const percentage = ((value / total) * 100).toFixed(2);
                                return `${tooltipItem.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
    
    // Define colors for each pie chart
    const penelitianColors = ['#4BC0C0', '#36A2EB', '#add8e6'];
    const pengabdianColors = ['#32CD32', '#228B22', '#add8e6'];
    const penunjangColors = ['#DC143C', '#FFB6C1', '#36A2EB'];

    // Penelitian Chart
    const penelitianCtx = document.getElementById('penelitianChart').getContext('2d');
    const penelitianData = Object.values(scopeKegiatanData['Penelitian']);
    const penelitianLabels = Object.keys(scopeKegiatanData['Penelitian']);
    createPieChart(penelitianCtx, penelitianData, penelitianLabels, penelitianColors);

    // Pengabdian Chart
    const pengabdianCtx = document.getElementById('pengabdianChart').getContext('2d');
    const pengabdianData = Object.values(scopeKegiatanData['Pengabdian']);
    const pengabdianLabels = Object.keys(scopeKegiatanData['Pengabdian']);
    createPieChart(pengabdianCtx, pengabdianData, pengabdianLabels, pengabdianColors);

    // Penunjang Chart
    const penunjangCtx = document.getElementById('penunjangChart').getContext('2d');
    const penunjangData = Object.values(scopeKegiatanData['Penunjang']);
    const penunjangLabels = Object.keys(scopeKegiatanData['Penunjang']);
    createPieChart(penunjangCtx, penunjangData, penunjangLabels, penunjangColors);
});



    // Jurnal Internasional
    document.addEventListener('DOMContentLoaded', function() {
        var jurnalInternasionalCtx = document.getElementById('jurnalInternasionalChart').getContext('2d');
        var jurnalInternasionalData = @json($jurnalInternasionalData);
        var jurnalInternasionalLabels = ['Q1', 'Q2', 'Q3', 'Q4', 'No Q'];

        var jurnalInternasionalChart = new Chart(jurnalInternasionalCtx, {
            type: 'pie',
            data: {
                labels: jurnalInternasionalLabels,
                datasets: [{
                    data: jurnalInternasionalData,
                    backgroundColor: ['#4169e1', '#87ceeb', '#87cefa', '#b0e0e6', '#add8e6', '#fffaf0'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });

        // Jurnal Nasional
        var jurnalNasionalCtx = document.getElementById('jurnalNasionalChart').getContext('2d');
        var jurnalNasionalData = @json($jurnalNasionalData);
        var jurnalNasionalLabels = ['Sinta 1', 'Sinta 2', 'Sinta 3', 'Sinta 4', 'Sinta 5', 'Sinta 6', '-'];

        var jurnalNasionalChart = new Chart(jurnalNasionalCtx, {
            type: 'pie',
            data: {
                labels: jurnalNasionalLabels,
                datasets: [{
                    data: jurnalNasionalData,
                    backgroundColor: ['#4169e1', '#87ceeb', '#87cefa', '#b0e0e6', '#add8e6', '#fffaf0', '#d3d3d3'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });

        // Prosiding
        var prosidingCtx = document.getElementById('prosidingChart').getContext('2d');
        var prosidingData = @json($prosidingData);
        var prosidingLabels = ['Nasional', 'Internasional'];

        var prosidingChart = new Chart(prosidingCtx, {
            type: 'pie',
            data: {
                labels: prosidingLabels,
                datasets: [{
                    data: prosidingData,
                    backgroundColor: ['#4169e1', '#87ceeb'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });
    });
</script>
@endsection
