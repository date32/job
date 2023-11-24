<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ユーザー1',
            'password' => Hash::make('1'),
            'campany' => '会社1',
        ]);

        DB::table('users')->insert([
            'name' => 'ユーザー2',
            'password' => Hash::make('1'),
            'campany' => '会社2',
        ]);

        DB::table('users')->insert([
            'name' => 'ユーザー3',
            'password' => Hash::make('1'),
            'campany' => '会社3',
        ]);
    }
}
