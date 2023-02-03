<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function nice(Message $post, Request $request){
        $nice = New Like();
        $nice->message_id = $post->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        return back();
    }

    public function unnice(Message $post, Request $request){
        $user = Auth::user()->id;
        $nice = Like::where('message_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}

