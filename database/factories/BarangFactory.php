<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'KODEBRG' => $this->faker->unique()->lexify('??????'), // Contoh nilai unik secara acak
            'NAMABRG' => $this->faker->word,
            'SATUAN' => $this->faker->randomElement(['Unit', 'Pcs', 'Kg']), // Contoh pilihan acak
            'HARGABELI' => $this->faker->numberBetween(1000, 10000), // Contoh nilai antara 1000 dan 10000
        ];
    }
}
