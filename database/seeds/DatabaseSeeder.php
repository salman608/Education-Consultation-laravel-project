<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(LocationTableSeeder::class);
    }
}
