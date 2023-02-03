<?php
// いいね機能コントローラ
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\message_users;
use Illuminate\Support\Facades\Auth;

class message_usersController extends Controller
{
    public function like(Message $post, Request $request){
        $like = New message_users;
        $like->message_id = $post->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return view('detail');
    }

    public function unlike(Message $post, Request $request){
        $user = Auth::user->id;
        $nice = message_users::where('message_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return view('detail');
    }
}
