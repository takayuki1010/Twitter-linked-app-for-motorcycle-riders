<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
            // Updated_atは使わない（更新なし
            const UPDATED_AT = null;
            // 関連づけるテーブル
            protected $table = 'comments';
    
            // プライマリキー
            protected $primaryKey = 'id';
        
            // 変更可能カラム
            protected $fillable = [
                'message_id',
                'user_id',
                'comment'
            ];
    
            public function insert()
            {
                // コメントテーブルに追加
                // return $this->create([
                //     'message_id' => ,
                //     'user_id' => ,
                //     'comment' => $comment
                // ]);
            }

            //リレーション
            // 繋がっているコメントを表示する
            public function comment_user()
            {
                return $this->belongsTo(User::class);
            }

}
