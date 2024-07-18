<?php

namespace Database\Seeders;

use App\Models\Publikasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publikasi::create([
            'nama_publikasi' => 'Jurnal Nasional',
        ]);

        Publikasi::create([
            'nama_publikasi' => 'Jurnal Internasional',
        ]);

        Publikasi::create([
            'nama_publikasi' => 'Prosiding Nasional',
        ]);

        Publikasi::create([
            'nama_publikasi' => 'Prosiding Internasional',
        ]);

        Publikasi::create([
            'nama_publikasi' => 'HKI',
        ]);
    }
}
