<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class messageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'user_id' => 1,
                'message' => 'これが私のバイクです。',
                'message_img1' => 'storage/img/intro2.jpg',
                'message_img2' => 'storage/img/intro3.jpg',
                'created_at' => Now()
            ],
            [
                'user_id' => 1,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 2,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 5,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 3,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 5,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 2,
                'message' => '私のバイク壊れました。。。',
                'message_img1' => 'storage/img/google.png',
                'message_img2' => null,
                'created_at' => Now()
            ]
        ]);
        //
    }
}
