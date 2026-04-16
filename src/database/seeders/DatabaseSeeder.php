<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Child;
use App\Models\Reward;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        UsersTableSeeder::class,
        CategoriesTableSeeder::class,
        ChildrenTableSeeder::class,
        RewardsTableSeeder::class,
        TasksTableSeeder::class,
        ]);
    }
}
