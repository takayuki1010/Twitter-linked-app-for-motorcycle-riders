<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class commentController extends Controller
{
    //コメントの処理を記載
    public function comment(Request $request) {
        // バリデーション
        $params = [
            'comment' => ['required', 'string', 'max:140']
        ];
        $this->validate($request, $params);

        $comment = $request->comment;

        $comment_post = $this->comments->insertComment($comment);
        return view('/detail/{id}');
    }
}
