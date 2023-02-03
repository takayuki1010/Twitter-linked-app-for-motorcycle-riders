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
        if(Auth::attempt($params)) {
            $request->session()->regenerate();
            return redirect('list');
        } else {
            $loginerrors = '既に登録されている情報です。';
            return redirect()->back();
        }
    }
}
