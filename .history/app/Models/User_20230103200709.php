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
        public function usertable() {
            return $this->hasMany(Message::class);
        }

        public function likes()
        {
            return $this->belongsToMany('App\Models\Message','likes','user_id','message_id')->withTimestamps();
        }
    
        //この投稿に対して既にlikeしたかどうかを判別する
        public function isLike($messageId)
        {
            return $this->likes()->where('message_id',$messageId)->exists();
        }
    
        //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
        public function like($messageId)
        {
            if($this->isLike($messageId)){
            //もし既に「いいね」していたら何もしない
            } else {
            $this->likes()->attach($messageId);
            }
        }
    
        //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
        public function unlike($messageId)
        {
            if($this->isLike($messageId)){
            //もし既に「いいね」していたら消す
            $this->likes()->detach($messageId);
            } else {
            }
        }
}
