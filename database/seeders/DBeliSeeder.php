<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\DBeli;
use App\Models\HBeli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DBeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $hbeli = HBeli::where('NOTRANSAKSI', 'B' . $i)->first();
            $barang = Barang::find($i);

            $qty = $faker->numberBetween(1, 20);
            $diskon = $faker->numberBetween(0, 50);

            $totalHarga = $barang->HARGABELI * $qty; 
            $diskonRupiah = $totalHarga * $diskon / 100; 
            $totalRp = $totalHarga - $diskonRupiah;

            DBeli::create([
                'NOTRANSAKSI' => $hbeli->NOTRANSAKSI,
                'KODEBRG' => $barang->KODEBRG,
                'HARGABELI' => $barang->HARGABELI,
                'QTY' => $qty,
                'DISKON' => $diskon,
                'DISKONRP' => $diskonRupiah,
                'TOTALRP' => $totalRp, 
            ]);
        }
    }
}
