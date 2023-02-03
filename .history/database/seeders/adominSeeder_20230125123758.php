<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adominSeeder extends Seeder
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
                'name' => 'テスト１',
                'email' => 'admin@test.com',
                'password' => Hash::make('222222'),
                'role' => '911913',
                'created_at' => Now()
            ]);
    }
}
