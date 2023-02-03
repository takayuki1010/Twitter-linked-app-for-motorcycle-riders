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
        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'いいバイクですね。'
        ]);
        $date->save();

        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'これは乗りやすいですか？'
        ]);
        $date->save();

        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '渋い。'
        ]);
        $date->save();

        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '明日は晴れですって。'
        ]);
        $date->save();

        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => '教科書化して'
        ]);
        $date->save();

        $date = new \App\Models\Comment([
            'message_id' => '1',
            'user_id' => '1',
            'comment' => 'うんちっち'
        ]);
        $date->save();
    }
}
