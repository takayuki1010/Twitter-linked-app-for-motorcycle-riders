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
                'comment'
            ];

            // リレーション モデルと関連するレコード名記載
            public function commentdate() {
                return $this->belongsTo('App\Message', 'message_id');
            }

            public function user() {
                return $this->BelongsTo('App\User', 'user_id');
            }

            // public function insertComment($messageId, $comment) {
            //     return $this->create([
            //         'message_id' => $messageId,
            //         'comment' => $comment
            //     ]);
            // }
}
