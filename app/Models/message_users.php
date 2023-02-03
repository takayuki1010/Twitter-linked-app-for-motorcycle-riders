<?php
// いいね機能モデル
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'user_id'
    ];

    // いいね機能
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function message() {
        return $this->belongsTo(Message::class);
    }
}
