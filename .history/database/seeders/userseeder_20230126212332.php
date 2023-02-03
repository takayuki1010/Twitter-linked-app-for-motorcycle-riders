<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'テスト１',
                'email' => 'test1@test.com',
                'password' => Hash::make('111111'),
                'img' => 'storage/img/twitter.png',
                'role' => '0',
                'created_at' => Now()
            ],
            [
                'name' => 'テスト2',
                'email' => 'test2@test.com',
                'password' => Hash::make('111111'),
                'img' => 'storage/img/intro4.jpg',
                'role' => '0',
                'created_at' => Now()
            ],
            [
                'name' => 'テスト3',
                'email' => 'test3@test.com',
                'password' => Hash::make('111111'),
                'img' => 'storage/img/intro1.jpg',
                'role' => '0',
                'created_at' => Now()
            ],
            [
                'name' => 'テスト4',
                'email' => 'test4@test.com',
                'password' => Hash::make('111111'),
                'img' => 'storage/img/fb.png',
                'role' => '0',
                'created_at' => Now()
            ],
            [
                'name' => 'テスト5',
                'email' => 'test5@test.com',
                'password' => Hash::make('111111'),
                'img' => 'storage/img/eyecatch.jpg',
                'role' => '0',
                'created_at' => Now()
            ]
        ]);
    }
}
