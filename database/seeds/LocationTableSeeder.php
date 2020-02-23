<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'city_id' => 1,
            'name' => 'Adabor',
        ]);
        DB::table('locations')->insert([
            'city_id' => 1,
            'name' => 'Aftabnagar',
        ]);
        DB::table('locations')->insert([
            'city_id' => 1,
            'name' => 'Agargaon',
        ]);
        DB::table('locations')->insert([
            'city_id' => 1,
            'name' => 'Airport Area',
        ]);
    }
}
