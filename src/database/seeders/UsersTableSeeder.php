<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $params = [
            [
            'name' => '山田太郎',
            'email' => 'yamada@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
            ]
        ];
        DB::table('users')->insert($params);
    }
}
