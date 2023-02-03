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

            // リレーション モデルと関連するレコード名記載
            public function commentDate() {
                return $this->belongsToMany(Message::class, 'message_id');
            }

            public function user() {
                return $this->BelongsTo('App\User', 'user_id');
            }
}
