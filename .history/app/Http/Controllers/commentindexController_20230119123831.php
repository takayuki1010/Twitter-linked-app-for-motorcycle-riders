<?php
// comment画面へ遷移
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;

class commentindexController extends Controller
{
    public function commentindex($id)
    {
        // コメントのユーザー情報
        $messages = Message::find($id);
        dd($messages);
        return view('comment', compact('messages'));
    }
}
