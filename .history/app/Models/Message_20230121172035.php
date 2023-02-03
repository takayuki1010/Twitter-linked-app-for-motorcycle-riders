<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
        // Updated_atは使わない（更新なし
        const UPDATED_AT = null;
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
            // メッセージテーブルに追加
            return $this->create([
                'user_id' => $id,
                'message' => $posttext,
                'message_img1' => $postImg1,
                'message_img2' => $postImg2
            ]);
        }

        //リレーション
        // ユーザーから取ってくる
        public function usertable()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        // 繋がっているコメントを表示する
        // public function comment_message()
        // {
        //     return $this->hasMany(Comment::class,'message_id')->orderBy('created_at', 'desc');
        // }

        // ポリモーフィック
        public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }
}
