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
        public function messagetable() {
            return $this->hasMany(Message::class);
        }


        // 多対多
        public function likes() {
            return $this->belongsToMany('App\Models\Message', 'likes', 'user_id', 'message_id')->withTimestamps();
        }

        // 投稿に対し既にいいねしたか判別
        public function isLike($messageId) {
            return $this->likes()->where('message_id', $messageId)->exists();
        }

        // 既にいいねしたか確認後にいいねする（重複させない）
        public function like($messageId) {
            if($this->isLike($messageId)) {
                // 既にいいねされていればそのまま
            } else {
                $this->likes()->attach($messageId);
            }
        }

        // 既にいいねされていれば解除
        public function unlike($messageId) {
            if($this->isLike($messageId)) {
                $this->likes()->detach($messageId);
            } else {
                
            }
        }
}
