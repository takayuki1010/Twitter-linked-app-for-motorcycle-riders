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
                'comment',
                'created_at'
            ];

            public function insertComment($messageId, $comment) {
                return $this->create([
                    'message_id' => $messageId.
                    'comment' => $comment
                ]);
            }
}
