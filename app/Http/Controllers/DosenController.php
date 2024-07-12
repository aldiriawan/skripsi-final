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

        $dosen = $query->get();
        $selectedDosen = null;
        $penunjang = collect();
        $tingkatSuratCounts = [];
        $selectedDosenId = null; // Inisialisasi variabel

        if ($dosen_id) {
            $selectedDosen = Dosen::find($dosen_id);
            if ($selectedDosen) {
                $penunjang = SuratTugas::where('dosen_id', $dosen_id)
                    ->where('jenis_id', 4)
                    ->when($tahun, function ($query) use ($tahun) {
                        $query->whereYear('waktu_awal', $tahun);
                    })
                    ->orderBy('waktu_akhir', 'desc')  // Urutkan berdasarkan waktu_akhir dari terbaru ke terlama
                    ->limit(8)  // Batasi hasil maksimal 8 data
                    ->get();
        
                $selectedDosenId = $request->input('dosen_id');
                // Menghitung jumlah tingkat surat untuk setiap tingkat (S1, S2, S3, S4, S5, S6)
                $tingkatSuratCounts = [
                    'S1' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 4)->count(),
                    'S2' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 5)->count(),
                    'S3' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 6)->count(),
                    'S4' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 7)->count(),
                    'S5' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 8)->count(),
                    'S6' => SuratTugas::where('dosen_id', $selectedDosenId)->where('tingkat_id', 9)->count(),
                ];
            }
        }
        
        

        // Mengambil jumlah publikasi internasional
        $jumlahPublikasiInternasional = 0;
        $jumlahPublikasiNasional = 0;
        $jumlahHKI = 0;

        if ($selectedDosenId) {
            $jumlahPublikasiInternasional = SuratTugas::where('dosen_id', $selectedDosenId)
                ->where('publikasi_id', 1)
                ->when($tahun, function ($query) use ($tahun) {
                    $query->whereYear('waktu_awal', $tahun);
                })
                ->count();

            $jumlahPublikasiNasional = SuratTugas::where('dosen_id', $selectedDosenId)
                ->where('publikasi_id', 2)
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

    $selectedDosenId = $request->query('dosen_id');
    $selectedDosen = Dosen::find($selectedDosenId);

    // Query untuk menghitung jumlah berdasarkan jenis_id per tahun
    $suratTugasCounts = DB::table('surat_tugas')
        ->select(DB::raw('YEAR(tanggal) as tahun'), 
                 DB::raw('SUM(CASE WHEN jenis_id = 1 THEN 1 ELSE 0 END) as total_pengabdian'), // Pengabdian
                 DB::raw('SUM(CASE WHEN jenis_id = 2 THEN 1 ELSE 0 END) as total_penunjang'),  // Penunjang
                 DB::raw('SUM(CASE WHEN jenis_id = 3 THEN 1 ELSE 0 END) as total_penelitian'), // Penelitian
                 DB::raw('SUM(CASE WHEN jenis_id = 4 THEN 1 ELSE 0 END) as total_pengajaran')) // Pengajaran
        ->where('dosen_id', $selectedDosenId)
        ->groupBy(DB::raw('YEAR(tanggal)'))
        ->orderBy('tahun')
        ->get();
    
    $years = [2022, 2023, 2024];
    $pengabdianData = [];
    $penunjangData = [];
    $penelitianData = [];
    $pengajaranData = [];

    foreach ($years as $year) {
        $data = $suratTugasCounts->firstWhere('tahun', $year);

        $pengabdianData[] = $data ? $data->total_pengabdian : 0;
        $penunjangData[] = $data ? $data->total_penunjang : 0;
        $penelitianData[] = $data ? $data->total_penelitian : 0;
        $pengajaranData[] = $data ? $data->total_pengajaran : 0;
    }

        return view('dosen.index', [
            'title' => 'Data Dosen',
            'dosen' => $dosen,
            'selectedDosen' => $selectedDosen,
            'penunjang' => $penunjang,
            'jumlahPublikasiInternasional' => $jumlahPublikasiInternasional,
            'jumlahPublikasiNasional' => $jumlahPublikasiNasional,
            'jumlahHKI' => $jumlahHKI,
            'selectedDosenId' => $selectedDosenId,
            'tahun' => $tahun, // Menambahkan tahun ke view
            'tingkatSuratCounts' => $tingkatSuratCounts,
            'pengabdianData' => $pengabdianData,
            'penunjangData' => $penunjangData,
            'penelitianData' => $penelitianData,
            'pengajaranData' => $pengajaranData,
        ]);
    }

    public function create()
    {
        return view('dosen.create', [
            'title' => 'Tambah Dosen Baru',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', [
            'title' => 'Edit Data Dosen',
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
}
