<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->query('search');
    $program_studi = $request->query('program_studi');
    $dosen_id = $request->query('dosen_id'); // Mendapatkan ID dosen yang dipilih
    $tahun = $request->query('tahun'); // Mendapatkan tahun yang dipilih
    $query = Dosen::query();

    if ($search) {
        $query->where('nama', 'like', '%' . $search . '%');
    }

    if ($program_studi) {
        $query->where('program_studi', $program_studi);
    }

    $query->orderBy('nama', 'asc'); // Tambahkan ini untuk mengurutkan nama dosen dari A-Z

    $dosen = $query->get();
    $selectedDosen = null;
    $penunjang = collect();
    $akreditasiNasionalCounts = [];
    $akreditasiInternasionalCounts = [];
    $selectedDosenId = null; // Inisialisasi variabel

    // Koding Bagian Penunjang
    if ($dosen_id) {
        $selectedDosen = Dosen::find($dosen_id);
        if ($selectedDosen) {
            $penunjang = SuratTugas::where('dosen_id', $dosen_id)
            ->where('jenis_id', 4)
            ->where('visibility', false)
            ->orderBy('waktu_akhir', 'desc')  // Urutkan berdasarkan waktu_akhir dari terbaru ke terlama
            ->limit(10)  // Batasi hasil maksimal 10 data
            ->get();

    
            $selectedDosenId = $request->input('dosen_id');
            // Menghitung jumlah akreditasi surat untuk setiap akreditasi (S1, S2, S3, S4, S5, S6)
            $akreditasiNasionalCounts = [
                'S1' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 4)->whereYear('waktu_awal', $tahun)->count(),
                'S2' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 5)->whereYear('waktu_awal', $tahun)->count(),
                'S3' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 6)->whereYear('waktu_awal', $tahun)->count(),
                'S4' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 7)->whereYear('waktu_awal', $tahun)->count(),
                'S5' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 8)->whereYear('waktu_awal', $tahun)->count(),
                'S6' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 9)->whereYear('waktu_awal', $tahun)->count(),
                '-' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 2)->whereYear('waktu_awal', $tahun)->count(),
            ];

            $akreditasiInternasionalCounts = [
                'Q1' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 10)->whereYear('waktu_awal', $tahun)->count(),
                'Q2' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 11)->whereYear('waktu_awal', $tahun)->count(),
                'Q3' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 12)->whereYear('waktu_awal', $tahun)->count(),
                'Q4' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 13)->whereYear('waktu_awal', $tahun)->count(),
                'No Q' => SuratTugas::where('dosen_id', $selectedDosenId)->where('akreditasi_id', 3)->whereYear('waktu_awal', $tahun)->count(),
            ];
        }
    }

    $selectedDosenId = $request->query('dosen_id');
    $selectedDosen = Dosen::find($selectedDosenId);
    $tahun = $request->query('tahun', 2024);  // Default ke tahun 2024

    // Mengambil jumlah publikasi
    $jumlahPublikasiInternasional = 0;
    $jumlahPublikasiNasional = 0;
    $jumlahHKI = 0;

    if ($selectedDosenId) {
        
        $jumlahPublikasiNasional = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('akreditasi_id', 2)
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('waktu_awal', $tahun);
            })
            ->count();
        
        $jumlahPublikasiInternasional = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('akreditasi_id', 3)
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('waktu_awal', $tahun);
            })
            ->count();

        $jumlahHKI = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('jenis_id', 3)
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('waktu_awal', $tahun);
            })
            ->count();
    }

    // Query untuk menghitung jumlah berdasarkan jenis_id per tahun
    $suratTugasCounts = DB::table('surat_tugas')
        ->select(DB::raw('YEAR(tanggal) as tahun'), 
                DB::raw('SUM(CASE WHEN jenis_id = 1 THEN 1 ELSE 0 END) as total_pengajaran'), // pengajaran
                DB::raw('SUM(CASE WHEN jenis_id = 2 THEN 1 ELSE 0 END) as total_penelitian'),  // penelitian
                DB::raw('SUM(CASE WHEN jenis_id = 3 THEN 1 ELSE 0 END) as total_pengabdian'), // pengabdian
                DB::raw('SUM(CASE WHEN jenis_id = 4 THEN 1 ELSE 0 END) as total_penunjang')) // penunjang
        ->where('dosen_id', $selectedDosenId)
        ->groupBy(DB::raw('YEAR(tanggal)'))
        ->orderBy('tahun')
        ->get();

    $years = [2021, 2022, 2023, 2024];
    $pengajaranData = [];
    $penelitianData = [];
    $pengabdianData = [];
    $penunjangData = [];

    foreach ($years as $year) {
        $data = $suratTugasCounts->firstWhere('tahun', $year);

        $pengajaranData[] = $data ? $data->total_pengajaran : 0;
        $penelitianData[] = $data ? $data->total_penelitian : 0;
        $pengabdianData[] = $data ? $data->total_pengabdian : 0;
        $penunjangData[] = $data ? $data->total_penunjang : 0;
    }

    return view('dosen.index', [
        'title' => 'Daftar Dosen',
        'dosen' => $dosen,
        'selectedDosen' => $selectedDosen,
        'penunjang' => $penunjang,
        'jumlahPublikasiInternasional' => $jumlahPublikasiInternasional,
        'jumlahPublikasiNasional' => $jumlahPublikasiNasional,
        'jumlahHKI' => $jumlahHKI,
        'selectedDosenId' => $selectedDosenId,
        'tahun' => $tahun, // Menambahkan tahun ke view
        'akreditasiNasionalCounts' => $akreditasiNasionalCounts,
        'akreditasiInternasionalCounts' => $akreditasiInternasionalCounts,
        'pengajaranData' => $pengajaranData,
        'penelitianData' => $penelitianData,
        'pengabdianData' => $pengabdianData,
        'penunjangData' => $penunjangData,
    ]);
}


    public function create()
    {
        return view('dosen.create', [
            'title' => 'Buat Dosen Baru',
            'dosen' => Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'program_studi' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Dosen::create($validatedData);

        return redirect('/dosen')->with('success', 'Data Dosen baru sukses ditambahkan!');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', [
            'title' => 'Administrasi Data Dosen',
            'dosen' => $dosen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', [
            'title' => 'Edit Dosen',
            'dosen' => $dosen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules = [
            'nama' => 'required',
            'program_studi' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Dosen::where('id', $dosen->id)
            ->update($validatedData);

        return redirect('/dosen')->with('success', 'Data Dosen sudah diubah!');
    }

    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect('/dosen')->with('success', 'Data sudah terhapus!');
    }

    public function toggleVisibility($id)
    {
    $suratTugas = SuratTugas::findOrFail($id);
    $suratTugas->visibility = !$suratTugas->visibility;
    $suratTugas->save();

    return back()->with('success', 'Visibilitas berhasil diubah!');
    }

}
