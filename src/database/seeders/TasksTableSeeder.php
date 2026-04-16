<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{

    public function run(): void
    {
        $params = [
            [
            'category_id' => '1',
            'title' => 'お皿の片付け',
            'point' =>10
            ],
            [
            'category_id' => '2',
            'title' => 'ダンス頑張った',
            'point' =>10
            ],
        ];
        DB::table('tasks')->insert($params);
    }
}
