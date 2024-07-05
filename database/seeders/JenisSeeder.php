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
            'nama_jenis' => 'Pengajaran'
        ]);

        Jenis::create([
            'nama_jenis' => 'Penelitian'
        ]);

        Jenis::create([
            'nama_jenis' => 'Pengabdian'
        ]);

        Jenis::create([
            'nama_jenis' => 'Penunjang'
        ]);
    }
}
