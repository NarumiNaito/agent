<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
            'tel' => '08055555555',
            'postcode' => '9590000',
            'address' => '燕市分水五千石',
            'detail' => '金物屋を経営'
            ],
            [
            'name' => 'aaa',
            'email' => 'aaa@aaa.com',
            'password' => Hash::make('password123'),
            'tel' => '08066666666',
            'postcode' => '9591111',
            'address' => '燕市吉田',
            'detail' => '器物屋を経営'
            ],
            ]
            ); 
    }
}
