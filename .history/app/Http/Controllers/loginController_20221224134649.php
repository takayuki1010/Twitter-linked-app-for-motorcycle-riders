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

        $params = [
            'loginname' => ['required', 'string', 'max:10'],
            'loginpass' => ['required', 'string', 'min:6', 'max:12']
        ];
        $this->validate($request, $params);

        // バリデーションされたものがデータベースにあるか？
        if(Auth::attempt(['loginname' => $request->input('loginname'), 'loginpass' => input('loginpass')])) {
            $request->session()->regenerate();
            $request->session()->put('name', $loginname);
            $request->session()->put('password', $loginpass);
            return view('list');
        } else {
            $loginerrors = 'loginerror';
            return redirect()->back();
        }
    }
}