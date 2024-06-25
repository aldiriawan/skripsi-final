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
            'nama_bukti' => 'Artikel' //1
        ]);

        Bukti::create([
            'nama_bukti' => 'HKI' //2
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Akhir' //3
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Kegiatan' //4
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Penelitian' //5
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Perkembangan' //6
        ]);

        Bukti::create([
            'nama_bukti' => 'Publikasi (Modul)' //7
        ]);

        Bukti::create([
            'nama_bukti' => 'Sertifikat' //8
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Keputusan' //9
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Permohonan' //10
        ]);

        Bukti::create([
            'nama_bukti' => 'Membership' //11
        ]);

        Bukti::create([
            'nama_bukti' => 'Poster' //12
        ]);

        Bukti::create([
            'nama_bukti' => 'Prosiding' //13
        ]);

        Bukti::create([
            'nama_bukti' => 'Sampul Luar Buku' //14
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Tugas' //15
        ]);

        Bukti::create([
            'nama_bukti' => 'Halaman Pengesahan' //16
        ]);

        Bukti::create([
            'nama_bukti' => 'Laporan Pelaksanaan' //17
        ]);

        Bukti::create([
            'nama_bukti' => 'Perjanjian Kerja Sama' //18
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Ucapan Terimakasih' //19
        ]);

        Bukti::create([
            'nama_bukti' => 'Surat Undangan' //20
        ]);
    }
}
