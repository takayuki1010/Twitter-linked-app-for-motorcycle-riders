<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// authファサード
use Illuminate\Support\Facades\Auth;
// withpaginationトレント使用
use Livewire\WithPagination;
// 関連させるテーブルのモデルを記載
use App\Models\User;
use App\Models\Image;
use App\Models\Message;

class loginController extends Controller
{
    //
    public function logindated() {
        return redirect()->route('logindated');
    }


    // 入力された値をバリデーション
    public function logindate(Request $request) {
        // バリデーション
        $validate = [
            'loginname' => ['required','string', 'max:10'],
            'loginpass' => ['required', 'string','min:6', 'max:12']
        ];
        $this->validate($request, $validate);

        $loginname = $request->loginname;
        $loginpass = $request->loginpass;

        $params = [
            'name' => $loginname,
            'password' => $loginpass
        ];

        // バリデーションされたものがデータベースにあるか？
        if(Auth::attempt($params)) {
            $request->session()->regenerate();
            // $request->session()->put('name', $loginname);
            // $request->session()->put('password', $loginpass);

            // ページネーション
            $messages = Message::paginate(3);

            //外部キーで外部キーで取ってきているユーザー名を表示。
            $messname = Post::whereBelongsTo('user')->get();

        dd($messname);

            return view('list', compact('messages'));
        }
    }
}
