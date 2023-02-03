<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// authファサード
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    // 入力された値をバリデーション
    public function logindate(Request $request) {
        dd($request->all());
        $loginname = $request->loginname;
        $loginpass = $request->loginpass;

        $logindate = $request->validate([
            'loginname' => ['required', 'string'],
            'loginpassword' => ['required','string']
        ]);

        // バリデーションされたものがデータベースにあるか？
        if(Auth::attempt($logindate)) {
            $request->session()->regenerate();
            $request->session()->put('name', $loginname);
            $request->session()->put('password', $loginpass);
            return redirect('list');
        } else {
            $loginerrors = 'エラーです';
            return redirect()->back();
        }
    }
}
