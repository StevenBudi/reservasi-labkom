<?php

namespace App\Database\Seeds;

use App\Models\Member;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $memberModel = new Member();
        $faker = \Faker\Factory::create("id_ID");

        for ($i=0; $i < 50; $i++) { 
            $memberModel->save([
                'nama' => $faker->name,
                'telepon' => $faker->phoneNumber,
                'password'=> hash('sha256', $faker->password),
                'email' => $faker->unique()->email,
                'alamat' => $faker->address,
                'avatar' => 'default.jpg'
            ]);
        }
    }
}
