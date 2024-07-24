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
            'name' => 'Dekan',
            'username' => 'dekan',
            'email' => 'dekan@ti.ukdw.ac.id',
            'password' => 'dekan1234'
        ]);

        User::create([
            'name' => 'Kaprodi Informatika',
            'username' => 'kaprodiinf',
            'email' => 'kaprodi.inf@staff.ukdw.ac.id',
            'password' => 'kaprodiinf1234'
        ]);

        User::create([
            'name' => 'Kaprodi Sistem Informasi',
            'username' => 'kaprodisi',
            'email' => 'kaprodi.si@staff.ukdw.ac.id',
            'password' => 'kaprodisi1234'
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ti.ukdw.ac.id',
            'password' => 'admin1234'
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
