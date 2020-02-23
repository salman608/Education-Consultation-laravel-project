<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Bangla Medium',
        ]);
    }

    /*
    Bangla Medium
    English Version
    English Medium
    Religious Studies
    Admission Test
    Arts
    Language Learning
    Test Preparation
    Professional Skill Development
    Special Skill Development
    Project/Assignment
    Madrasa Medium
    */
}
