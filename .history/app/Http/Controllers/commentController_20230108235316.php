<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use App\Models\Comment;

class commentController extends Controller
{

    // プロパティ作成
    private $comments;

    public function __construct() {
        // インスタンス定義 モデルのクラスをインスタンス
        $this->comments = new comment();
    }
    //コメントの処理を記載
    public function comment(Request $request) {
        // バリデーション
        $params = [
            'comment' => ['required', 'string', 'max:140']
        ];
        $this->validate($request, $params);

        $message_id = $request->user_id;
        $comment = $request->comment;
        // コメントするユーザーのid
        $user_dates = Auth::user();
        $user_id = $user_dates->id;
        dd($user_id);

        // dd($comment);

        $comment_post = $this->comments->insertComment($message_id, $user_id, $comment);
        
        return view('/detail/{$request->id}');
    }
}
