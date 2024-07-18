<?php

namespace Database\Seeders;

use App\Models\Akreditasi;
use App\Models\Publikasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkreditasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akreditasi::create([
            'nama_akreditasi' => 'Lokal',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Nasional',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Internasional',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 1',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 2',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 3',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 4',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 5',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Sinta 6',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Q1',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Q2',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Q3',
        ]);

        Akreditasi::create([
            'nama_akreditasi' => 'Q4',
        ]);
    }
}
