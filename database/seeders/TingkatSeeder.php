<?php

namespace Database\Seeders;

use App\Models\Tingkat;
use App\Models\Publikasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tingkat::create([
            'nama_tingkat' => 'Lokal',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Nasional',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Internasional',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 1',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 2',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 3',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 4',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 5',
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 6',
        ]);
    }
}
