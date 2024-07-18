<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BuktiSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\JenisSeeder;
use Database\Seeders\PeranSeeder;
use Database\Seeders\PublikasiSeeder;
use Database\Seeders\AkreditasiSeeder;
use Database\Seeders\KategoriSeeder;

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
            AkreditasiSeeder::class,
            KategoriSeeder::class,
        ]);
    }
}
