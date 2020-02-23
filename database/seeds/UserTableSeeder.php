<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Md. Mesbaul Islam',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => 'administrator',
        ]);
    }
}
