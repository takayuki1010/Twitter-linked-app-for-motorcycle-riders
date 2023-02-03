<?php
// いいね機能コントローラ
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\message_user;
use Illuminate\Support\Facades\Auth;

class message_userController extends Controller
{
    public function like(Message $post, Request $request){
        $like = New message_user();
        $like->message_id = $post->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }

    
}
