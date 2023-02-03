<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    use HasFactory;

    // Updated_atは使わない（更新なし
    const UPDATED_AT = null;
    // 関連づけるテーブル
    protected $table = 'admin_user';

    // プライマリキー
    protected $primaryKey = 'id';

    // 変更可能カラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
