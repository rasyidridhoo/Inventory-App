<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Barang::create([
                'KODEBRG' => 'B' . $i, // Atur kode barang sesuai kebutuhan Anda
                'NAMABRG' => 'Nama Barang ' . $i,
                'SATUAN' => 'Satuan ' . $i,
                'HARGABELI' => $i * 1000, // Atur harga beli sesuai kebutuhan Anda
            ]);
        }
        // \App\Models\Barang::factory(10)->create();

        // \App\Models\Barang::factory()->create([
        //     'KODEBRG' => 'TV0001',
        //     'NAMABRG' => 'TV',
        //     'SATUAN' => 'Unit',
        //     'HARGABELI' => '5000000'
        // ]);
    }
}
