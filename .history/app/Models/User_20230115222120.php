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

    // 関連づけるテーブル
    protected $table = 'users';

    // プライマリキー
    protected $primaryKey = 'id';

    // 変更可能カラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'img'
    ];
    // ユーザー登録
    public function insert($reginame, $regiemail, $regipass, $regiimg)
    {
        // ユーザーテーブルに追加
        return $this->create([
            'name' => $reginame,
            'email' => $regiemail,
            'password' => Hash::make($regipass),
            'img' => $regiimg
        ]);
    }
    // ユーザー情報変更
    public function userupdate($userid, $loginname, $loginemail, $loginimg)
    {
        return Users::where($userid)->update([
            'name' => $loginname,
            'email' => $loginemail,
            'img' => $loginimg,
        ]);
    }

}
