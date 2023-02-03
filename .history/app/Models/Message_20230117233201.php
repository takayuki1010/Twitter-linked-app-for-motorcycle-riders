<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

        // 関連づけるテーブル
        protected $table = 'messages';

        // プライマリキー
        protected $primaryKey = 'id';
    
        // 変更可能カラム
        protected $fillable = [
            'user_id',
            'message',
            'message_img1',
            'message_img2'
        ];

        public function insert($id, $posttext, $postImg1, $postImg2)
        {
            // ユーザーテーブルに追加
            return $this->create([
                'user_id' => $id,
                'message' => $posttext,
                'message_img1' => $postImg1,
                'message_img2' => $postImg2
            ]);
        }
}
