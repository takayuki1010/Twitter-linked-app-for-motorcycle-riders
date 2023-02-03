<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withdrawalController extends Controller
{
    public function withset(Request $request) {
        // ログイン情報が間違いないか
        if()

        //ログインしているユーザーのid
        $usernumber = Auth::id();
        $user = App\Models\User::find($usernumber);
        dd($user);
        $user->delete();
    }
}
