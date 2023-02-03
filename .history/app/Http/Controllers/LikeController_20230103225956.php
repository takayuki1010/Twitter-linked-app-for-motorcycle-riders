<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function store($messageId) {
        Auth::user()->like($messageId);
        return 'ok!';
    }

    public function destroy($messageId) {
        Auth::user()->unlike($messageId);
        return 'ok!';
    }
}

