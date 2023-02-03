<?php

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
        return $this->belongsTo(message::class)
    }


}
