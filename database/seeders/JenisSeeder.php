<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis::create([
            'nama_jenis' => 'Lokakarya' //1
        ]);

        Jenis::create([
            'nama_jenis' => 'Penunjang' //2
        ]);

        Jenis::create([
            'nama_jenis' => 'Publikasi' //3
        ]);

        Jenis::create([
            'nama_jenis' => 'Seminar' //4
        ]);

        Jenis::create([
            'nama_jenis' => 'Asesor BKD' //5
        ]);

        Jenis::create([
            'nama_jenis' => 'Penelitian' //6
        ]);

        Jenis::create([
            'nama_jenis' => 'Pengabdian' //7
        ]);

        Jenis::create([
            'nama_jenis' => 'Reviewer' //8
        ]);

        Jenis::create([
            'nama_jenis' => 'Tim Khusus' //9
        ]);

        Jenis::create([
            'nama_jenis' => 'Pembimbing' //10
        ]);
    }
}
