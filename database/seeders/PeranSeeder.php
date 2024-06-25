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
            'nama_peran' => 'Peserta' //1
        ]);

        Peran::create([
            'nama_peran' => 'Penulis/Pencipta' //2
        ]);

        Peran::create([
            'nama_peran' => 'Tim/Panitia' //3
        ]);

        Peran::create([
            'nama_peran' => 'Narasumber/Pembicara' //4
        ]);

        Peran::create([
            'nama_peran' => 'Pembimbing' //5
        ]);

        Peran::create([
            'nama_peran' => 'Moderator' //6
        ]);

        Peran::create([
            'nama_peran' => 'Reviewer' //7
        ]);
    }
}
