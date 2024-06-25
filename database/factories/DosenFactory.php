<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $program_studi = ['Informatika', 'Sistem Informasi'];

        return [
            'name' => fake()->name(),
            'nik' => fake()->unique()->nik(),
            'email' => fake()->unique()->safeEmail(),
            'telepon' => fake()->unique()->phoneNumber('+62##########'),
            'user_id' => mt_rand(1, 2),
            'program_studi' => $program_studi[array_rand($program_studi)],
        ];
    }
}
