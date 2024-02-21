<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert(
            [
            'name' => 'プレス',
            'price' => '100000',
            'deadline' => '30',
            'content' => '研磨',
            'skill' => '粗仕上げ〜鏡面まで',
            'status' => '0'
            ],
            [
            'name' => '研磨',
            'price' => '300000',
            'deadline' => '30',
            'content' => 'プレス',
            'skill' => '粗仕上げ〜鏡面まで',
            'status' => '1'
            ],
            [
            'name' => '鍛造',
            'price' => '600000',
            'deadline' => '30',
            'content' => '鍛造',
            'skill' => '粗仕上げ〜鏡面まで',
            'status' => '1'
            ],
    );
    }
}
