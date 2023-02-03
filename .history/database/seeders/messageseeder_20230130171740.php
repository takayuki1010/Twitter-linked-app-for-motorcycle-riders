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
                'message' => 'バイク納車しました。',
                'message_img1' => 'images/20200501_noimage.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => 'バイク乗り換えたのに乗りづらい・・・',
                'message_img1' => 'storage/img/cafe5.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 5,
                'message' => 'バイクおりました。ありがとうバイク・・・',
                'message_img1' => 'storage/img/cafe3.jpg',
                'message_img2' => 'storage/img/cafe4.jpg',
                'created_at' => Now()
            ],
            [
                'user_id' => 3,
                'message' => '今日のツーリングは雨でした。',
                'message_img1' => 'images/20200501_noimage.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => '天気悪いと何もできない',
                'message_img1' => 'storage/img/cafe7.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 4,
                'message' => '明日も仕事です。バイク乗りたい・・・',
                'message_img1' => 'storage/img/exp1.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 5,
                'message' => 'バイクで事故したけどどうすればいいんや。。。',
                'message_img1' => 'storage/img/cafe1.jpg',
                'message_img2' => null,
                'created_at' => Now()
            ],
            [
                'user_id' => 2,
                'message' => 'あぁ〜水素の音ぉ〜！！',
                'message_img1' => 'storage/img/apple.png',
                'message_img2' => null,
                'created_at' => Now()
            ]
        ]);
        //
    }
}
