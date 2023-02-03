<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adominseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            [
                'name' => '管理者１',
                'email' => 'admin@test.com',
                'password' => Hash::make('222222'),
                'role' => '911913',
                'created_at' => Now()
            ]
        ]);
    }
}
