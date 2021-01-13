<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        //Users Seeder
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'username' => Str::random(5),
            'password' => Hash::make('password'),
        ]);

        //products seeder
        DB::table('products')->insert([
            'name' => 'Samsung S7 edge',
            'category' => 'Android',
            'description' => 'SM-G935',
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung',
            'category' => 'S8',
            'description' => 'SM-G950',
        ]);
        DB::table('products')->insert([
            'name' => 'LG G5',
            'category' => 'Android',
            'description' => 'LG-H860',
        ]);
        DB::table('products')->insert([
            'name' => 'LG G5',
            'category' => 'Android',
            'description' => 'LG-F700',
        ]);
        DB::table('products')->insert([
            'name' => 'Apple iPhone 6s+',
            'category' => 'iOS',
            'description' => 'A1688',
        ]);
    }
}
