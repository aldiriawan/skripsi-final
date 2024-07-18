<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use App\Models\Dosen;
use App\Models\Jenis;
use App\Models\Peran;
use App\Models\Bukti;
use App\Models\Tingkat;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use App\Imports\SuratTugasImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;

class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = SuratTugas::query();

    // Filter berdasarkan pencarian nomor surat, nama dosen, atau keterangan surat
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('nomor', 'like', "%$search%")
              ->orWhereHas('dosen', function ($q) use ($search) {
                  $q->where('nama', 'like', "%$search%");
              })
              ->orWhere('keterangan', 'like', "%$search%");
    }

    // Ambil semua surat tugas, diurutkan berdasarkan tanggal surat dibuat (descending) dan menggunakan paginate()
    $suratTugas = $query->orderBy('tanggal', 'desc')->paginate(10);

    return view('surattugas.index', [
        'title' => 'Daftar Surat Tugas',
        'surattugas' => $suratTugas,
    ]);
}




    public function ImportExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new SuratTugasImport, $request->file('import_file'));

        return redirect()->back()->with('success', 'Import Sukses');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('surattugas.create', [
        'title' => 'Buat Surat Tugas Baru',
        'surattugas' => SuratTugas::all(),
        'dosen' => Dosen::all(),
        'peran' => Peran::all(),
        'jenis' => Jenis::all(),
        'bukti' => Bukti::all(),
        'tingkat' => Tingkat::all(),
        'publikasi' => Publikasi::all(),
    ]);
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $validatedData = $request->validate([
        'nomor' => 'required',
        'dosen_id' => 'required|array',
        'tanggal' => 'required|date',
        'keterangan' => 'required',
        'waktu_awal' => 'required|date',
        'waktu_akhir' => 'required|date',
        'bukti_id' => 'required',
        'jenis_id' => 'required',
        'tingkat_id' => 'required',
        'peran_id' => 'required',
        'publikasi_id' => 'required'
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    foreach ($validatedData['dosen_id'] as $dosenId) {
        $suratTugasData = $validatedData;
        $suratTugasData['dosen_id'] = $dosenId;
        SuratTugas::create($suratTugasData);
    }

    return redirect('/surattugas')->with('success', 'Data Surat baru sukses ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(SuratTugas $suratTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $suratTugas = SuratTugas::with('dosen')->findOrFail($id);

    return view('surattugas.edit', [
        'title' => 'Ubah Surat Tugas',
        'suratTugas' => $suratTugas,
        'dosen' => Dosen::all(),
        'peran' => Peran::all(),
        'jenis' => Jenis::all(),
        'bukti' => Bukti::all(),
        'tingkat' => Tingkat::all(),
        'publikasi' => Publikasi::all(),
    ]);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nomor' => 'required',
        'dosen_id' => 'required|array',
        'tanggal' => 'required|date',
        'keterangan' => 'required',
        'waktu_awal' => 'required|date',
        'waktu_akhir' => 'required|date',
        'bukti_id' => 'required',
        'jenis_id' => 'required',
        'tingkat_id' => 'required',
        'peran_id' => 'required',
        'publikasi_id' => 'required'
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    $suratTugas = SuratTugas::findOrFail($id);
    $suratTugas->update($validatedData);

    // Hapus relasi dosen sebelumnya
    $suratTugas->dosen()->detach();

    // Tambahkan relasi dosen baru
    foreach ($validatedData['dosen_id'] as $dosenId) {
        $suratTugas->dosen()->attach($dosenId);
    }

    return redirect('/surattugas')->with('success', 'Data Surat tugas berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratTugas $suratTugas)
    {
        SuratTugas::destroy($suratTugas->id);
        return redirect('/surattugas')->with('success', 'Data  sudah terhapus!');
    }
}
