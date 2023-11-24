<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            'user' => 'ユーザー1',
            'name' => 'メンバー1',
            'campany' => '会社1',
        ]);

        DB::table('members')->insert([
            'user' => 'ユーザー1',
            'name' => 'メンバー2',
            'campany' => '会社2',
        ]);

        DB::table('members')->insert([
            'user' => 'ユーザー1',
            'name' => 'メンバー3',
            'campany' => '会社3',
        ]);
    }
}
