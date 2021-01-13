<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use DB;

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
        //Admin seeder
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@praxxys.com',
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);
    }
}
