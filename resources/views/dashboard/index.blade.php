@extends('layouts.main')

@section('container')
<div class="row">
    <!-- Komposisi Beban Dosen -->
    <div class="col-md-5">
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
                <canvas id="pieChart" class="small-pie-chart"></canvas>
            </div>

            <!-- Pie Chart Informatika -->
            <div class="col-md-4">
                <h8 class="my-3">Informatika</h8>
                <canvas id="pieChartInformatika" class="smaller-pie-chart"></canvas>
            </div>

            <!-- Pie Chart Sistem Informasi -->
            <div class="col-md-4">
                <h8 class="my-3">Sistem Informasi</h8>
                <canvas id="pieChartSistemInformasi" class="smaller-pie-chart"></canvas>
            </div>
        </div>
    </div>

    <!-- Kinerja Dosen per Tahun -->
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Kinerja Dosen per Tahun</h4>
                <canvas id="barChart" class="large-bar-chart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Dosen dengan Beban Terbesar dan Terendah -->
<div class="row mt-4">
    <div class="col-md-5">
        <div class="row">
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
                <canvas id="topDosenChart" class="large-bar-chart"></canvas>
            </div>
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Dosen dengan Beban Terendah</h4>
                <canvas id="bottomDosenChart" class="large-bar-chart"></canvas>
            </div>
        </div>
    </div>

    <!-- Scope Kegiatan dan Publikasi -->
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Scope Kegiatan</h4>
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
                <canvas id="scopeKegiatanChart" class="large-bar-chart"></canvas>
            </div>
            <!-- Publikasi -->
            <div class="col-md-12 mb-3">
                <h4 class="my-3">Publikasi</h4>
                <div class="row">
                    <div class="col-md-5">
                        <canvas id="jurnalInternasionalChart" class="large-pie-chart"></canvas>
                    </div>
                    <div class="col-md-5">
                        <canvas id="jurnalNasionalChart" class="large-pie-chart"></canvas>
                    </div>
                    <div class="col-md-5">
                        <canvas id="prosidingChart" class="smaller-pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .small-pie-chart {
        max-width: 400px;
        max-height: 400px;
        margin: 0 auto;
    }
    .smaller-pie-chart {
        max-width: 150px;
        max-height: 150px;
        margin: 0 auto;
    }
    .large-bar-chart {
        max-width: 100%;
        max-height: 350px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data for Pie Chart
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

        // Data for Bar Chart
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
                            maxRotation: 90,
                            minRotation: 45
                        },
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true
                    }
                }
            }
        });

        // Data for Top Dosen Chart
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

        // Data for Bottom Dosen Chart
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
        // Jurnal Internasional
        var jurnalInternasionalCtx = document.getElementById('jurnalInternasionalChart').getContext('2d');
        var jurnalInternasionalData = [25, 20, 15, 10, 5, 25]; // Dummy data for Q1, Q2, Q3, Q4, No Q, -
        var jurnalInternasionalLabels = ['Q1', 'Q2', 'Q3', 'Q4', 'No Q', '-'];

        var jurnalInternasionalChart = new Chart(jurnalInternasionalCtx, {
            type: 'pie',
            data: {
                labels: jurnalInternasionalLabels,
                datasets: [{
                    data: jurnalInternasionalData,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
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
        var jurnalNasionalLabels = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6', '-'];

        var jurnalNasionalChart = new Chart(jurnalNasionalCtx, {
            type: 'pie',
            data: {
                labels: jurnalNasionalLabels,
                datasets: [{
                    data: jurnalNasionalData,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#C0C0C0'],
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
                    backgroundColor: ['#FF6384', '#36A2EB'],
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
