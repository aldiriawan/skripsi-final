<?php

namespace Database\Seeders;

use App\Models\Bukti;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuktiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bukti::create([
            'nama_bukti' => 'Artikel'
        ]);

        Bukti::create([
            'nama_bukti' => 'HKI'
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Akhir'
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Kegiatan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Penelitian'
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Perkembangan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Publikasi (Modul)'
        ]);

        Bukti::create([
            'nama_bukti' => 'Sertifikat'
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Keputusan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Permohonan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Membership'
        ]);

        Bukti::create([
            'nama_bukti' => 'Poster'
        ]);

        Bukti::create([
            'nama_bukti' => 'Prosiding'
        ]);

        Bukti::create([
            'nama_bukti' => 'Sampul Luar Buku'
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Tugas'
        ]);

        Bukti::create([
            'nama_bukti' => 'Halaman Pengesahan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Pelaksanaan'
        ]);

        Bukti::create([
            'nama_bukti' => 'Perjanjian Kerja Sama'
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Ucapan Terimakasih'
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Undangan'
        ]);
    }
}
