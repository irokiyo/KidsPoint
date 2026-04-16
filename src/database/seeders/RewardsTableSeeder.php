<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardsTableSeeder extends Seeder
{

    public function run(): void
    {
        $params = [
            [
            'name' => 'アイプリ',
            'point' => 100,
            ]
        ];
        DB::table('rewards')->insert($params);
    }
}
