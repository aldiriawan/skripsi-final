<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $selectedAkreditasi = $request->query('akreditasi', 'Semua Akreditasi');
    $search = $request->query('search');
    
    // Filter berdasarkan akreditasi jika dipilih dan bukan 'Semua Akreditasi'
    $surattugasQuery = DB::table('surat_tugas')
        ->select('keterangan', DB::raw('GROUP_CONCAT(dosen.nama SEPARATOR ", ") as penulis_dosen'), 'akreditasi.nama_akreditasi', 'surat_tugas.created_at')
        ->join('dosen', 'surat_tugas.dosen_id', '=', 'dosen.id')
        ->join('akreditasi', 'surat_tugas.akreditasi_id', '=', 'akreditasi.id')
        ->where('jenis_id', 2) // penelitian
        ->groupBy('keterangan', 'akreditasi.nama_akreditasi', 'surat_tugas.created_at');
    
    if ($selectedAkreditasi !== 'Semua Akreditasi') {
        $surattugasQuery->where('akreditasi.nama_akreditasi', $selectedAkreditasi);
    }
    
    if ($search) {
        $surattugasQuery->where(function($query) use ($search) {
            $query->where('keterangan', 'like', "%{$search}%")
                ->orWhere('dosen.nama', 'like', "%{$search}%")
                ->orWhere('akreditasi.nama_akreditasi', 'like', "%{$search}%");
        });
    }
    
    // Mendapatkan data surat tugas dengan pagination
    $surattugas = $surattugasQuery->orderBy('surat_tugas.created_at', 'desc')->paginate(10);
    
    return view('publikasi.index', [
        'title' => 'Daftar Publikasi',
        'surattugas' => $surattugas,
        'selectedAkreditasi' => $selectedAkreditasi, // Mengirimkan parameter yang dipilih ke view
        'search' => $search, // Mengirimkan kata kunci pencarian ke view
    ]);
}

}
