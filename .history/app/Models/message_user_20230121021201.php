<?php
// いいね機能モデル
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'user_id'
    ];

    public function message()
    {
        return $this->belongsTo(message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        /**
  * リプライにLIKEを付いているかの判定
  *
  * @return bool true:Likeがついてる false:Likeがついてない
  */
    public function is_liked_by_auth_user()
    {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
        array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
        return true;
    } else {
        return false;
    }
  }

}
