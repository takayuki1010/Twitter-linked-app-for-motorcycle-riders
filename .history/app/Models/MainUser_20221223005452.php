<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class MainUser extends Model
{
    use HasFactory;

        // 関連づけるテーブル
        protected $table = 'mainusers';

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
}
