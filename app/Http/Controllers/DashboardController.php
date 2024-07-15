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
    
        // Koding untuk Beban Dosen Terbesar dan Terendah : -----------------------
        $topDosenData = DB::table('surat_tugas')
            ->select(DB::raw('dosen_id, jenis_id, COUNT(*) as count'))
            ->groupBy('dosen_id', 'jenis_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->get()
            ->groupBy('dosen_id')
            ->mapWithKeys(function ($group, $dosenId) {
                return [$dosenId => $group->map(function ($item) {
                    return [
                        'jenis_id' => $item->jenis_id,
                        'count' => $item->count
                    ];
                })->toArray()];
            })
            ->toArray();
    
        $bottomDosenData = DB::table('surat_tugas')
            ->select(DB::raw('dosen_id, jenis_id, COUNT(*) as count'))
            ->groupBy('dosen_id', 'jenis_id')
            ->orderByRaw('COUNT(*) ASC')
            ->limit(10)
            ->get()
            ->groupBy('dosen_id')
            ->mapWithKeys(function ($group, $dosenId) {
                return [$dosenId => $group->map(function ($item) {
                    return [
                        'jenis_id' => $item->jenis_id,
                        'count' => $item->count
                    ];
                })->toArray()];
            })
            ->toArray();
    
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
