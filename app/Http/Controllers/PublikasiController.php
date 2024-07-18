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
        $selectedTingkat = $request->query('tingkat', 'Semua Tingkatan');
        $search = $request->query('search');
    
        // Filter berdasarkan tingkat jika dipilih dan bukan 'Semua Tingkatan'
        $surattugasQuery = DB::table('surat_tugas')
            ->select('keterangan', DB::raw('GROUP_CONCAT(dosen.nama SEPARATOR ", ") as penulis_dosen'), 'tingkat.nama_tingkat', 'surat_tugas.created_at')
            ->join('dosen', 'surat_tugas.dosen_id', '=', 'dosen.id')
            ->join('tingkat', 'surat_tugas.tingkat_id', '=', 'tingkat.id')
            ->where('jenis_id', 2) // penelitian
            ->groupBy('keterangan', 'tingkat.nama_tingkat', 'surat_tugas.created_at');
    
        if ($selectedTingkat !== 'Semua Tingkatan') {
            $surattugasQuery->where('tingkat.nama_tingkat', $selectedTingkat);
        }
    
        if ($search) {
            $surattugasQuery->where(function($query) use ($search) {
                $query->where('keterangan', 'like', "%{$search}%")
                    ->orWhere('dosen.nama', 'like', "%{$search}%")
                    ->orWhere('tingkat.nama_tingkat', 'like', "%{$search}%");
            });
        }
    
        // Mendapatkan data surat tugas dengan pagination
        $surattugas = $surattugasQuery->orderBy('surat_tugas.created_at', 'desc')->paginate(10);
    
        return view('publikasi.index', [
            'title' => 'Daftar Publikasi',
            'surattugas' => $surattugas,
            'selectedTingkat' => $selectedTingkat, // Mengirimkan parameter yang dipilih ke view
            'search' => $search, // Mengirimkan kata kunci pencarian ke view
        ]);
    }
}
