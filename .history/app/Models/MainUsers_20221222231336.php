<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    // 関連づけるテーブル
    protected $table = 'mainusers';

    // プライマリキー
    protected $primaryKey = 'id';
}
