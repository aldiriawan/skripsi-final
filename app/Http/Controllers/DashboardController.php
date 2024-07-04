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
        $years = [2022, 2023, 2024];

        // Inisialisasi data array untuk masing-masing jenis
        $pengabdianData = [];
        $penunjangData = [];
        $pengajaranData = [];
        $penelitianData = [];

        foreach ($years as $year) {
            $pengabdianData[$year] = SuratTugas::where('jenis_id', 1) // Jenis 1 adalah Pengabdian
                ->whereYear('tanggal', $year)
                ->count();

            $penunjangData[$year] = SuratTugas::where('jenis_id', 2) // Jenis 2 adalah Penunjang
                ->whereYear('tanggal', $year)
                ->count();

            $pengajaranData[$year] = SuratTugas::where('jenis_id', 3) // Jenis 3 adalah Pengajaran
                ->whereYear('tanggal', $year)
                ->count();

            $penelitianData[$year] = SuratTugas::where('jenis_id', 4) // Jenis 4 adalah Penelitian
                ->whereYear('tanggal', $year)
                ->count();
        }

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'years' => $years,
            'pengabdianData' => array_values($pengabdianData),
            'penunjangData' => array_values($penunjangData),
            'pengajaranData' => array_values($pengajaranData),
            'penelitianData' => array_values($penelitianData),
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
