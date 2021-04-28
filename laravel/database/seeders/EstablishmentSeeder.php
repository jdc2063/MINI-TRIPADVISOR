<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('establishment')->insert([
            'name' => 'Manga Story',
            'address' => '13 Boulevard Voltaire',
            'city' => 'Paris',
            'ZIP code' => 75011,
            'country' => 'France',
        ]);

        DB::table('establishment')->insert([
            'name' => 'Hayaku Shop Manga',
            'address' => '4 Rue Dante',
            'city' => 'Paris',
            'ZIP code' => 75005,
            'country' => 'France',
        ]);
    }
}
