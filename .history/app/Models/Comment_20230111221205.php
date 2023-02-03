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

            // update_atはないから追加
            const UPDATED_AT = null;

            // 登録、変更可能カラムの指定
            protected $fillable = [
                'message_id',
                'user_id',
                'comment'
            ];

            // コメント登録
            public function insertComment($message_id, $user_id, $comment) {
                return $this->create([
                    'message_id' => $message_id,
                    'user_id' => $user_id,
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

            // 画像が撮りたい
            public function commentUsersimg() {
                return $this->belongsToMany(Message::class,'message_id');
            }
}
