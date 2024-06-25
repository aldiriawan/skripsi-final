<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratTugas>
 */
class SuratTugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis = ['Pengabdian', 'Penelitian', 'Penunjang'];
        $bukti = ['Sertifikat', 'Undangan', 'Laporan', 'Modul', 'Materi'];

        return [
            'nomor' => fake()->buildingNumber(),
            'tanggal' => fake()->date(),
            'keterangan' => fake()->sentence(3),
            'waktu' => fake()->date(),
            'bukti' => $bukti[array_rand($bukti)],
            'jenis' => $jenis[array_rand($jenis)],
            'dosen_id' => mt_rand(1, 15),
        ];
    }
}
