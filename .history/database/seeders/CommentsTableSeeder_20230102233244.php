<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'いいバイクですね。'
        ];

        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'これは乗りやすいですか？'
        ];

        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '渋い。'
        ];

        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '明日は晴れですって。'
        ];

        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '教科書化して'
        ];

        $params = [
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'うんちっち'
        ];
    }
}
