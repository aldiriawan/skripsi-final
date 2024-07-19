<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratTugas;
use App\Models\Dosen;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Koding untuk Komposisi Beban Dosen : -------------------------
        // Data untuk keseluruhan
        $data = DB::table('surat_tugas')
            ->select(DB::raw('jenis_id, COUNT(*) as count'))
            ->groupBy('jenis_id')
            ->pluck('count', 'jenis_id')->toArray();
    
            // Data untuk Informatika
            $dataInformatika = DB::table('surat_tugas')
                ->join('dosen', 'surat_tugas.dosen_id', '=', 'dosen.id')
                ->where('dosen.program_studi', 'Informatika')
                ->select(DB::raw('jenis_id, COUNT(*) as count'))
                ->groupBy('jenis_id')
                ->pluck('count', 'jenis_id')->toArray();
            
        // Data untuk Sistem Informasi
        $dataSistemInformasi = DB::table('surat_tugas')
            ->join('dosen', 'surat_tugas.dosen_id', '=', 'dosen.id')
            ->where('dosen.program_studi', 'Sistem Informasi')
            ->select(DB::raw('jenis_id, COUNT(*) as count'))
            ->groupBy('jenis_id')
            ->pluck('count', 'jenis_id')->toArray();
    
        // Koding untuk Kinerja Dosen Per Tahun : -----------------------
        $years = [2021, 2022, 2023, 2024];  // Update tahun
    
        // Inisialisasi data array untuk masing-masing jenis
        $pengajaranData = [];
        $penelitianData = [];
        $pengabdianData = [];
        $penunjangData = [];
    
        foreach ($years as $year) {
            $pengajaranData[$year] = SuratTugas::where('jenis_id', 1) // Jenis 1 adalah pengajaran
                ->whereYear('tanggal', $year)
                ->count();
    
            $penelitianData[$year] = SuratTugas::where('jenis_id', 2) // Jenis 2 adalah penelitian
                ->whereYear('tanggal', $year)
                ->count();
    
            $pengabdianData[$year] = SuratTugas::where('jenis_id', 3) // Jenis 3 adalah pengabdian
                ->whereYear('tanggal', $year)
                ->count();
    
            $penunjangData[$year] = SuratTugas::where('jenis_id', 4) // Jenis 4 adalah Penunjang
                ->whereYear('tanggal', $year)
                ->count();
        }
    
        // Koding untuk Beban Tugas Terbanyak dan Terendah : -----------------------
        // Ambil data dosen dengan surat tugas terbanyak
        $topDosenData = DB::table('surat_tugas')
        ->select(DB::raw('dosen_id, COUNT(*) as count'))
        ->groupBy('dosen_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(5)
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->dosen_id => $item->count];
        });

        // Ambil data dosen dengan surat tugas tersedikit
        $bottomDosenData = DB::table('surat_tugas')
        ->select(DB::raw('dosen_id, COUNT(*) as count'))
        ->groupBy('dosen_id')
        ->orderByRaw('COUNT(*) ASC')
        ->limit(5)
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->dosen_id => $item->count];
        });

        // Ambil nama dosen dari tabel dosen
        $dosenNames = DB::table('dosen')
        ->whereIn('id', array_merge(array_keys($topDosenData->toArray()), array_keys($bottomDosenData->toArray())))
        ->pluck('nama', 'id');

    // Koding untuk Scope Kegiatan : -----------------------
    // Dropdown tahun
    $years = [2021, 2022, 2023, 2024];
    $selectedYear = $request->input('year', 2024);

    // Data untuk Pie Chart berdasarkan jenis_id dan kategori_id
    $scopeKegiatanData = [
        'Penelitian' => DB::table('surat_tugas')
            ->where('jenis_id', 2)
            ->whereYear('tanggal', $selectedYear)
            ->select('kategori_id', DB::raw('COUNT(*) as count'))
            ->groupBy('kategori_id')
            ->pluck('count', 'kategori_id')->toArray(),
        'Pengabdian' => DB::table('surat_tugas')
            ->where('jenis_id', 3)
            ->whereYear('tanggal', $selectedYear)
            ->select('kategori_id', DB::raw('COUNT(*) as count'))
            ->groupBy('kategori_id')
            ->pluck('count', 'kategori_id')->toArray(),
        'Penunjang' => DB::table('surat_tugas')
            ->where('jenis_id', 4)
            ->whereYear('tanggal', $selectedYear)
            ->select('kategori_id', DB::raw('COUNT(*) as count'))
            ->groupBy('kategori_id')
            ->pluck('count', 'kategori_id')->toArray(),
    ];

        // Koding untuk Publikasi : -----------------------
        // Fetch data for Jurnal Nasional
        $jurnalNasionalData = SuratTugas::whereIn('akreditasi_id', [2, 4, 5, 6, 7, 8, 9])
        ->selectRaw('akreditasi_id, COUNT(*) as count')
        ->groupBy('akreditasi_id')
        ->pluck('count', 'akreditasi_id');

        $jurnalNasionalData = [
        $jurnalNasionalData[2] ?? 0,
        $jurnalNasionalData[4] ?? 0,
        $jurnalNasionalData[5] ?? 0,
        $jurnalNasionalData[6] ?? 0,
        $jurnalNasionalData[7] ?? 0,
        $jurnalNasionalData[8] ?? 0,
        $jurnalNasionalData[9] ?? 0
        ];

        // Fetch data for Prosiding
        $prosidingData = SuratTugas::whereIn('publikasi_id', [1, 2])
        ->selectRaw('publikasi_id, COUNT(*) as count')
        ->groupBy('publikasi_id')
        ->pluck('count', 'publikasi_id');

        $prosidingData = [
        $prosidingData[1] ?? 0,
        $prosidingData[2] ?? 0
        ];
    
        return view('dashboard.index', [
            'title' => 'Dashboard',
            // View untuk Komposisi Beban Dosen :
            'data' => $data,
            'dataInformatika' => $dataInformatika,
            'dataSistemInformasi' => $dataSistemInformasi,
            // View untuk Kinerja Dosen Per Tahun :
            'years' => $years,
            'pengajaranData' => array_values($pengajaranData),
            'penelitianData' => array_values($penelitianData),
            'pengabdianData' => array_values($pengabdianData),
            'penunjangData' => array_values($penunjangData),
            // View untuk Beban Dosen Terbesar dan Terendah :
            'topDosenData' => $topDosenData,
            'bottomDosenData' => $bottomDosenData,
            'dosenNames' => $dosenNames,
            // View untuk Scope Kegiatan
            'selectedYear' => $selectedYear,
            'scopeKegiatanData' => $scopeKegiatanData,
            // View untuk Publikasi
            'jurnalNasionalData' => $jurnalNasionalData,
            'prosidingData' => $prosidingData,
        ]);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
