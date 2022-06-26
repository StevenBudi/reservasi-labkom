<?php

namespace App\Database\Seeds;

use App\Models\ReservasiLabkom;
use CodeIgniter\Database\Seeder;

class LabSeeder extends Seeder
{
    public function run()
    {
        $labModel = new ReservasiLabkom();
        $faker = \Faker\Factory::create("id_ID");

        for ($i=0; $i < 20; $i++) { 
            $labModel->save([
                "peminjam" => $faker->name,
                'labkom' => $faker->randomElement(['tkj', 'rpl', 'mulmed']),
                'waktu_peminjaman' => $faker->dateTime('now')->format('Y-m-d H:i:s'),
                'waktu_penggunaan' => $faker->dateTime->format('Y-m-d H:i:s'),
                'waktu_akhir_penggunaan' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'status' => $faker->randomElement(['finished', 'unfinished']),
                'catatan' => $faker->randomLetter
            ]);
        }
    }
}
