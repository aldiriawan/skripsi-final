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
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
     
         // Ambil semua surat tugas, diurutkan berdasarkan tanggal surat dibuat (descending)
         $suratTugas = $query->orderBy('tanggal', 'desc')->get();
     
         // Mengelompokkan berdasarkan "Keterangan" yang sama
         $groupedSuratTugas = $suratTugas->groupBy('keterangan');
     
         // Mengelompokkan "Nama Dosen" yang memiliki "Keterangan" yang sama
         $formattedSuratTugas = new Collection();
         foreach ($groupedSuratTugas as $keterangan => $items) {
             $namaDosen = $items->pluck('dosen.nama')->unique()->implode(', ');
             $formattedSuratTugas->push([
                 'nomor' => $items->first()->nomor,
                 'nama_dosen' => $namaDosen,
                 'tanggal' => \Carbon\Carbon::parse($items->first()->tanggal)->format('d M Y'),
                 'keterangan' => $keterangan,
                 'id' => $items->first()->id, // jika perlu menambahkan ID untuk link detail
             ]);
         }
     
         // Pagination
         $perPage = 10;
         $currentPage = Paginator::resolveCurrentPage('page'); // Resolve halaman saat ini dengan nama 'page'
         $itemsForCurrentPage = $formattedSuratTugas->slice(($currentPage - 1) * $perPage, $perPage)->all();
         $suratTugasPaginated = new LengthAwarePaginator($itemsForCurrentPage, count($formattedSuratTugas), $perPage, $currentPage, [
             'path' => Paginator::resolveCurrentPath(),
             'pageName' => 'page',
         ]);
     
         // Append pencarian ke pagination links
         $suratTugasPaginated->appends(['search' => $request->input('search')]);
     
         return view('surattugas.index', [
             'title' => 'Daftar Surat Tugas',
             'surattugas' => $suratTugasPaginated,
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
    public function show($id)
    {
        $suratTugas = SuratTugas::with(['dosen', 'peran', 'jenis', 'bukti', 'tingkat', 'publikasi'])->findOrFail($id);

        return view('surattugas.show', [
            'title' => 'Detail Surat Tugas',
            'suratTugas' => $suratTugas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // app/Http/Controllers/SuratTugasController.php

public function edit($id)
{
    $suratTugas = SuratTugas::findOrFail($id);
    $dosen = Dosen::all(); // Ambil semua data dosen untuk dropdown

    return view('surattugas.edit', [
        'title' => 'Edit Surat Tugas',
        'suratTugas' => $suratTugas,
        'dosen' => $dosen,
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

    $suratTugas = SuratTugas::findOrFail($id);
    $suratTugas->update($validatedData);

    // Update dosen relations
    $suratTugas->dosen()->sync($validatedData['dosen_id']);

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
