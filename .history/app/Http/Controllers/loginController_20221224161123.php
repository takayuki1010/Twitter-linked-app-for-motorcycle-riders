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
        $loginname = $request->loginname;
        $loginpass = $request->loginpass;

        // $params = [
        //     'loginname' => ['required', 'string', 'max:10'],
        //     'loginpass' => ['required', 'string', 'min:6', 'max:12']
        // ];
        // $this->validate($request, $params);
        $logindate = $request->validate([
            'loginname' => ['required', 'string', 'max:10'],
            'loginpass' => ['required', 'string', 'min:6', 'max:12']
        ]);

        // バリデーションされたものがデータベースにあるか？
        if(Auth::attempt('name' => $loginname, 'password' => $loginpass)) {
            $request->session()->regenerate();
            // $request->session()->put('name', $loginname);
            // $request->session()->put('password', $loginpass);
            return redirect()->intended('list');
        } else {
            $loginerrors = 'エラーです';
            return redirect()->back();
        }
    }
}