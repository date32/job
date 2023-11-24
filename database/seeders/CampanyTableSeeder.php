<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campanies')->insert([
            'user' => 'ユーザー1',
            'name' => '会社1',
        ]);

        DB::table('campanies')->insert([
            'user' => 'ユーザー1',
            'name' => '会社2',
        ]);

        DB::table('campanies')->insert([
            'user' => 'ユーザー1',
            'name' => '会社3',
        ]);
    }
}
