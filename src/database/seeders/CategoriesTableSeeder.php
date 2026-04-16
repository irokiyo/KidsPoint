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
            ['name' => '料理系'],
            ['name' => 'お掃除系'],
            ['name' => '洗濯物系']
        ];
        DB::table('categories')->insert($params);
    }
}
