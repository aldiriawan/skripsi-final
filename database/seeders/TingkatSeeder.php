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
            'nama_tingkat' => 'Lokal', //1
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Nasional', //2
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Internasional', //3
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 1', //4
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 2', //5
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 3', //6
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 4', //7
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 5', //8
        ]);

        Tingkat::create([
            'nama_tingkat' => 'Sinta 6', //9
        ]);
    }
}
