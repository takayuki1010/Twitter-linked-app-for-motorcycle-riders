<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        'role',
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
    public function userupdate($id, $loginname, $loginemail, $loginimg)
    {
            //idのユーザー情報変更
            $userdate = User::find($id);

            $userdate->name = $loginname;
            $userdate->email = $loginemail;
            $userdate->img = $loginimg;

            return $userdate->save();
    }

    //ユーザーのパスワード変更
    public function reset($id, $checkpass)
    {
        DB::transaction(function(){
            $userreset = User::find($id);

            $userreset->password = Hash::make($checkpass);
    
            return $userreset->save();
        });
    }

    public function comment_user()
    {
        return $this->hasMany(Comment::class,'id');
    }

    public function messuser()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    // いいね機能
    public function message() {
        return $this->hasMany(Message::class);
    }

    public function likes() {
        return $this->hasMany(message_users::class);
    }
}
