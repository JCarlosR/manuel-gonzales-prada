<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        // Administrator
        User::create([
            'email' => 'admin@manuelgonzalesprada.com',
            'password' => bcrypt('123123'),

            'first_name' => 'Angel',
            'last_name' => 'Mantilla',
            'identity_card' => '76474871',
            'gender' => 'Hombre',

            'cellphone' => '966 543 777',
            'address' => 'Trujillo - Perú',
            'role_id' => 1
        ]);

        // Five students
        $faker = Faker\Factory::create();
        for ($i=0; $i<5; ++$i) {
            User::create([
                'email' => $faker->email,
                'password' => bcrypt('123123'),

                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'identity_card' => $faker->numerify('########'),
                'gender' => $faker->randomElement(['Hombre', 'Mujer']),

                'cellphone' => $faker->phoneNumber,
                'address' => $faker->streetAddress,
                'role_id' => 2
            ]);
        }
    }

}
