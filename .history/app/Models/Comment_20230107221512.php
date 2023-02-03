<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 関連づけるテーブル
    protected $table = 'comments';

    // プライマリキー
    protected $primaryKey = 'id';

            // 登録、変更可能カラムの指定
            protected $fillable = [
                'message_id',
                'user_id',
                'comment'
            ];

            // コメント登録
            public function insertComment($comment) {
                return $this->create([
                    'comment' => $comment
                ]);
            }

            // リレーション モデルと関連するレコード名記載
            public function commentDate() {
                return $this->belongsToMany(Message::class);
            }

            public function user() {
                return $this->belongsTo(User::class,'user_id');
            }

            public function userimg() {
                return $this->belongsTo(User::class,'message_id');
            }
}
