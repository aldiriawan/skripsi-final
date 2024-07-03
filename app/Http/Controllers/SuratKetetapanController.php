<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratTugas;

class SuratKetetapanController extends Controller
{
    public function index()
    {
        return view('suratketetapan.index', [
            'title' => 'Surat Ketetapan',
            'surattugas' => SuratTugas::all()
        ]);
    }
}
