<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Deliveryman extends Seeder
{
    public function run()
    {
        $faker = Factory::create("pt-BR");
        for ($i = 0; $i < 20; $i++) {
            $data = [
                "firstName" => $faker->firstName(),
                "lastName" => $faker->lastName(),
                "email" => $faker->email(),
                "cep" => $faker->address(),
                "city" => $faker->city(),
            ];
            $this->db->table("deliveryman")->insert($data);
        }
    }
}
