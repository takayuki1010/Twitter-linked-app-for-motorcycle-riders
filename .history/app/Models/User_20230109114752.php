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
    
        // 登録、変更可能カラムの指定
        protected $fillable = [
            'name',
            'email',
            'password',
            'img',
            'created_at',
            'updated_at'
        ];
    
        //会員登録　データベースへ登録
        public function insertUser($reginame, $regiemail, $regipass, $regiimg) {
            return $this->create([
                'name' => $reginame,
                'email' => $regiemail,
                'password' => Hash::make($regipass),
                'img' => $regiimg
            ]);
        }

        // リレーション
        public function messagesTable() {
            return $this->hasMany(Message::class);
        }
        // message_idで連携する（書かないとうまく連携できない
        public function commentUsers() {
            return $this->hasMany(Comment::class,'message_id')->orderBy('created_at', 'desc');
        }
}
