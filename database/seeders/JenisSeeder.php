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
            'nama_jenis' => 'Lokakarya'
        ]);

        Jenis::create([
            'nama_jenis' => 'Penunjang'
        ]);

        Jenis::create([
            'nama_jenis' => 'Publikasi'
        ]);

        Jenis::create([
            'nama_jenis' => 'Seminar'
        ]);

        Jenis::create([
            'nama_jenis' => 'Asesor BKD'
        ]);

        Jenis::create([
            'nama_jenis' => 'Penelitian'
        ]);

        Jenis::create([
            'nama_jenis' => 'Pengabdian'
        ]);

        Jenis::create([
            'nama_jenis' => 'Reviewer'
        ]);

        Jenis::create([
            'nama_jenis' => 'Seminar'
        ]);

        Jenis::create([
            'nama_jenis' => 'Tim Khusus'
        ]);

        Jenis::create([
            'nama_jenis' => 'Pembimbing'
        ]);
    }
}
