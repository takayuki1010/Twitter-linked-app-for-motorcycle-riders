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
        // dd($request->all());
        $validate = [
            // 'loginname' => ['required','string', 'max:10'],
            'loginemail' => ['required', 'email'],
            'loginpass' => ['required', 'string','min:6', 'max:12']
        ];
        $this->validate($request, $validate);

        $loginemail = $request->loginemail;
        $loginpass = $request->loginpass;

        $params = [
            'email' => $loginemail,
            'password' => $loginpass
        ];

        // バリデーションされたものがデータベースにあるか？
        if(Auth::attempt($params)) {
            $request->session()->regenerate();
            // $request->session()->put('email', $loginemail);
            // $request->session()->put('password', $loginpass);
            return redirect()->route('list');
        } else {
            $loginerrors = 'エラーです';
            return redirect()->back();
        }
    }
}
