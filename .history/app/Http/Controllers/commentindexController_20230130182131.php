<?php
// comment画面へ遷移
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;
use App\Models\Comment;

class commentindexController extends Controller
{
    public function commentindex($id)
    {
        // メッセージの内容
        $messages = Message::find($id);
        // メッセージのユーザー情報
        $messageuser = $messages->usertable;

        return view('comment', compact('messages', 'messageuser'));
    }
}
