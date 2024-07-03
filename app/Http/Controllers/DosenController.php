<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
                    ->where('jenis_id', 2)
                    ->when($tahun, function ($query) use ($tahun) {
                        $query->whereYear('waktu_awal', $tahun);
                    })
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
