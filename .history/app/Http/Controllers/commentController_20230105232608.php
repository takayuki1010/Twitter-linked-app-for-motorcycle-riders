<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class commentController extends Controller
{
    //コメントの処理を記載
    public function comment() {
        // バリデーション
        $params = [
            'comment' = ['required', 'string', 'max:140']
        ]
    }
}
