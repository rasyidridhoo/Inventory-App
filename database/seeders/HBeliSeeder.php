<?php

namespace Database\Seeders;

use App\Models\HBeli;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HBeliSeeder extends Seeder
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
            $supplier = Supplier::inRandomOrder()->first();

            HBeli::create([
                'NOTRANSAKSI' => 'B' . $i,
                'KODESPL' => $supplier->KODESPL,
                'TGLBELI' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
