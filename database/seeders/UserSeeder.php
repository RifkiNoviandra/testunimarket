<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //first user
        DB::table('users')->insert([
            'name'=>'Buyer',
            'email'=>'buyer@test.com',
            'password'=>Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@test.com',
            'password'=>Hash::make('1234'),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
    }
}
