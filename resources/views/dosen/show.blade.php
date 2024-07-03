@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="my-3">Dosen</h4>
            <div class="btn-group mb-1">
                @php
                    $selectedProgramStudi = request('program_studi');
                    $buttonLabel = $selectedProgramStudi ? $selectedProgramStudi : 'Pilih Program Studi';
                @endphp
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $buttonLabel }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dosen?program_studi=Informatika">Informatika</a></li>
                    <li><a class="dropdown-item" href="/dosen?program_studi=Sistem%20Informasi">Sistem Informasi</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-12 mb-3">
            <form action="/dosen" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
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
                <h4 class="my-3">{{ $selectedDosen->nama }}</h4>
                <!-- Grafik Batang -->
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>

            <div class="col-md-12 mb-3">
                <!-- Tabel -->
                <h4>Publikasi</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Kota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>30</td>
                                <td>New York</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>25</td>
                                <td>Los Angeles</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>David Brown</td>
                                <td>35</td>
                                <td>Chicago</td>
                            </tr>
                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12">
                <!-- List -->
                <h3>Penunjang</h3>
                <p>Tempat untuk menampilkan list data</p>
            </div>
        </div>

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
        </script>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
