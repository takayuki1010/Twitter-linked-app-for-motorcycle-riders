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
}
