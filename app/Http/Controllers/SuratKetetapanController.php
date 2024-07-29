<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratTugas;

class SuratKetetapanController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan tahun dari request atau default ke 2024
        $tahun = $request->input('tahun', 2024);

        // Mendapatkan keyword untuk pencarian
        $search = $request->input('search');

        $query = SuratTugas::where('jenis_id', 4)
            ->whereYear('waktu_akhir', $tahun)
            ->where('visibility', false);

        // Tambahkan kondisi pencarian jika ada keyword
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('keterangan', 'like', '%' . $search . '%')
                    ->orWhere('waktu_awal', 'like', '%' . $search . '%')
                    ->orWhere('waktu_akhir', 'like', '%' . $search . '%');
            });
        }

        // Mendapatkan data surat tugas dengan filter dan pencarian
        $suratTugas = $query->orderBy('waktu_akhir', 'desc')->get()->unique('keterangan');

        return view('suratketetapan.index', [
            'title' => 'Daftar ST/SK',
            'suratTugas' => $suratTugas,
            'selectedYear' => $tahun,
            'years' => [2021, 2022, 2023, 2024],
            'search' => $search,
        ]);
    }
}
