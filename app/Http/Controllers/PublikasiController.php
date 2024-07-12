<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Models\SuratTugas;
use App\Models\Dosen;
use App\Models\Peran;
use App\Models\Jenis;
use App\Models\Bukti;
use App\Models\Tingkat;
use App\Http\Requests\StorePublikasiRequest;
use App\Http\Requests\UpdatePublikasiRequest;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedTingkat = $request->query('tingkat');

        // Filter berdasarkan tingkat jika dipilih
        $surattugasQuery = SuratTugas::where('jenis_id', 2); //penelitian

        if ($selectedTingkat) {
            $surattugasQuery->whereHas('tingkat', function ($query) use ($selectedTingkat) {
                $query->where('nama_tingkat', $selectedTingkat);
            });
        }

        // Mendapatkan data surat tugas
        $surattugas = $surattugasQuery->orderBy('created_at', 'desc')->get();

        return view('publikasi.index', [
            'title' => 'Detail Publikasi',
            'surattugas' => $surattugas,
            'selectedTingkat' => $selectedTingkat, // Mengirimkan parameter yang dipilih ke view
            // Sisipkan data lain yang diperlukan untuk tampilan Anda di sini
        ]);
    }
}
