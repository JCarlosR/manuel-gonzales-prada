<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123'),

            'first_name' => 'Juan Carlos',
            'last_name' => 'Ramos Suyón',
            'identity_card' => '76474871',
            'gender' => 'Hombre',

            'cellphone' => '966543777',
            'address' => 'Los Rosales #136',
            'role_id' => 1
        ]);

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
