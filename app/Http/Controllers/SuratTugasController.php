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
    public function index()
    {

        $suratTugas = SuratTugas::orderBy('created_at', 'desc')->paginate(10);

        return view('surattugas.index', [
            'title' => 'Data Surat Tugas',
            'surattugas' => $suratTugas,
            'dosen' => Dosen::all(),
            'peran' => Peran::all(),
            'jenis' => Jenis::all(),
            'bukti' => Bukti::all(),
            'tingkat' => Tingkat::all(),
            'publikasi' => Publikasi::all(),
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
            'title' => 'Buat Data Surat Tugas',
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
            'dosen_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'bukti_id' => 'required',
            'jenis_id' => 'required',
            'tingkat_id' => 'required',
            'akreditasi' => 'required',
            'peran_id' => 'required',
            'publikasi_id' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        SuratTugas::create($validatedData);

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
    public function edit(SuratTugas $suratTugas)
    {
        return view('surattugas.edit', [
            'title' => 'Edit Data Surat Tugas',
            'surattugas' => $suratTugas,
            'dosen' => Dosen::all(),
            'peran' => Peran::all(),
            'jenis' => Jenis::all(),
            'bukti' => Bukti::all(),
            'tingkat' => Tingkat::all(),
            'publikasi' => Publikasi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratTugas $suratTugas)
    {
        $validatedData = $request->validate([
            'nomor' => 'required',
            'dosen_id' => 'required',
            'peran_id' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date',
            'bukti_id' => 'required',
            'jenis_id' => 'required',
            'publikasi_id' => 'nullable',
            'akreditasi' => 'required',
            'tingkat_id' => 'required',
        ]);

        $suratTugas->update($validatedData);

        return redirect('/surattugas')->with('success', 'Data surat tugas berhasil diperbarui!');
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
