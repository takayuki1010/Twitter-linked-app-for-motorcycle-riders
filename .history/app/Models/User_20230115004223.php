<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Model
class User extends Authenticatable
{
    use HasFactory;
    // 変更可能カラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'img'
    ];

    public function insert()
    {
        // ユーザーテーブルに追加
        users::create([
            'name' => $reginame,
            'email' => $regiemail,
            'password' => $regipass,
            'img' => $regiimg
        ]);
    }

}
