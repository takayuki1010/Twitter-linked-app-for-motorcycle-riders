<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LikeController extends Controller
{
    //
    public function store($messageId)
    {
        Auth::user()->like($messageId);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($messageId)
    {
        Auth::user()->unlilikeke($messageId);
        return 'ok!'; //レスポンス内容
    }
}

