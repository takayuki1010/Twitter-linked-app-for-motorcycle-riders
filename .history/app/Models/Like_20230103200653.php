<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // public function likes()
    // {
    //     return $this->belongsToMany('App\Models\Message','likes','user_id','message_id')->withTimestamps();
    // }

    // //この投稿に対して既にlikeしたかどうかを判別する
    // public function isLike($messageId)
    // {
    //     return $this->likes()->where('message_id',$messageId)->exists();
    // }

    // //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    // public function like($messageId)
    // {
    //     if($this->isLike($messageId)){
    //     //もし既に「いいね」していたら何もしない
    //     } else {
    //     $this->likes()->attach($messageId);
    //     }
    // }

    // //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    // public function unlike($messageId)
    // {
    //     if($this->isLike($messageId)){
    //     //もし既に「いいね」していたら消す
    //     $this->likes()->detach($messageId);
    //     } else {
    //     }
    // }
}
