<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Supplier::factory(10)->create();
        for ($i = 1; $i <= 5; $i++) {
            Supplier::create([
                'KODESPL' => 'S' . $i, // Atur kode supplier sesuai kebutuhan Anda
                'NAMASPL' => 'Nama Supplier ' . $i,
            ]);
        }
    }
}
