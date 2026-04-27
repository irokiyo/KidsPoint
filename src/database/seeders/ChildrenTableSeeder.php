<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenTableSeeder extends Seeder
{
    public function run(): void
    {
        $params = [
            [
            'user_id' => 1,
            'name' => '山田花子',
            'birthday' => '2000-01-01',
            'sex' => '女',
            'img_url' => null,
            ]
        ];
        DB::table('children')->insert($params);
    }
}
