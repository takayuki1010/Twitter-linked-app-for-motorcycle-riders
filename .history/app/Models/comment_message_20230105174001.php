<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_message extends Model
{
    use HasFactory;
    protected $table = 'comment_messages';

    protected $primaryKey = ['comment_id', 'message_id'];

                // 登録、変更可能カラムの指定
                protected $fillable = [
                    'comment_id',
                    'message_id'
                ];
}
