<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    public function run(): void
    {
        $params = [
            ['name' => '料理'],
            ['name' => '掃除'],
            ['name' => '洗濯'],
            ['name' => '買い物'],
            ['name' => 'その他'],
        ];
        DB::table('categories')->insert($params);
    }
}
