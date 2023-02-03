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

        // update_atはないから追加
        const UPDATED_AT = null;

        // userの中にあるプライマリキーを検索。
        public function userDate(){
            return $this->belongsTo('App\Models\User');
        }
    
        // 登録、変更可能カラムの指定
        protected $fillable = [
            'user_id',
            'message',
            'message_img1',
            'message_img2',
            'created_at'
        ];

        // コメント登録
        public function insertMessage($messid, $message, $messimg1, $messimg2) {
            return $this->create([
                'user_id' => $messid,
                'message' => $message,
                'message_img1' => $messimg1,
                'message_img2' => $messimg2
            ]);
        }

        // リレーション
        public function userTable() {
            return $this->belongsTo(User::class,'user_id');
        }

        // 多対多　コメントとのやりとり
        public function commentDetas() {
            return $this->belongsToMany(Comment::class);
        }

        // いいね機能
        public function useriine()
        {
            return $this->belongsToMany('App\User')->withTimestamps();
        }
}
