<?php

use App\Career;
use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::create([
            'name' => 'Computación e informática',
            'description' => ''
        ]);

        Career::create([
            'name' => 'Contabilidad',
            'description' => ''
        ]);

        Career::create([
            'name' => 'Mecánica',
            'description' => ''
        ]);
    }
}
