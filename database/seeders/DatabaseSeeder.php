<?php

namespace Database\Seeders;

use App\Models\Peran;
use App\Models\Publikasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aldi Riawan',
            'username' => 'aldie3103',
            'email' => 'aldi.riawan@gmail.com',
            'password' => bcrypt('password')
        ]);

        $this->call([
            BuktiSeeder::class,
            DosenSeeder::class,
            JenisSeeder::class,
            PeranSeeder::class,
            PublikasiSeeder::class,
            TingkatSeeder::class,
        ]);
    }
}
