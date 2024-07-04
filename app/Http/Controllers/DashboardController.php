<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data dari tabel surattugas dan urutkan berdasarkan beban terbesar
    $topDosen = DB::table('surat_tugas')
    ->select('dosen_id', DB::raw('count(*) as total'))
    ->groupBy('dosen_id')
    ->orderBy('total', 'desc')
    ->take(10)
    ->get();

    // Ambil nama dosen dan beban mereka
    $topDosenLabels = $topDosen->pluck('dosen_id')->toArray(); // Sesuaikan dengan kolom nama dosen jika ada
    $topDosenData = $topDosen->pluck('total')->toArray();

    return view('dashboard.index', [
        'title' => 'Dashboard',
        'topDosen' => $topDosen,
        'topDosenLabels' => $topDosenLabels,
        'topDosenData' => $topDosenData,
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
