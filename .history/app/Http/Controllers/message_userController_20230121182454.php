<?php
// いいね機能コントローラ
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\message_user;
use Illuminate\Support\Facades\Auth;

class message_userController extends Controller
{
    public function like(Post $post, Request $request){
        $nice=New Nice();
        $nice->post_id=$post->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }
}
