<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class withdrawalController extends Controller
{
    public function withset(Request $request) {
        // 一度情報をバリデーション
        $validate = [
            'withname' => ['required','string', 'max:10'],
            'withemail' => ['required', 'email'],
            'withpass' => ['required', 'string']
        ];
        $this->validate($request, $validate);
        // ログイン情報が間違いないか
        // if()

        //ログインしているユーザーのid
        $usernumber = Auth::id();
        $user = App\Models\User::find($usernumber);
        dd($user);
        $user->delete();
    }
}
