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
            'jenis_publikasi' => 'Jurnal Nasional',
        ]);

        Publikasi::create([
            'jenis_publikasi' => 'Jurnal Internasional',
        ]);

        Publikasi::create([
            'jenis_publikasi' => 'Prosiding Internasional',
        ]);

        Publikasi::create([
            'jenis_publikasi' => 'HKI',
        ]);
    }
}
