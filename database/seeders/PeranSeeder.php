<?php

namespace Database\Seeders;

use App\Models\Peran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peran::create([
            'nama_peran' => 'Peserta'
        ]);

        Peran::create([
            'nama_peran' => 'Penulis/Pencipta'
        ]);

        Peran::create([
            'nama_peran' => 'Tim/Panitia'
        ]);

        Peran::create([
            'nama_peran' => 'Narasumber/Pembicara'
        ]);

        Peran::create([
            'nama_peran' => 'Pembimbing'
        ]);

        Peran::create([
            'nama_peran' => 'Moderator'
        ]);

        Peran::create([
            'nama_peran' => 'Reviewer'
        ]);
    }
}
