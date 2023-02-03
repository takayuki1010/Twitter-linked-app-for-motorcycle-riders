<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_message extends Model
{
    use HasFactory;
    protected $table = 'comment_messages';

    protected $primaryKey = 'comment_id', 'message_id';
}
