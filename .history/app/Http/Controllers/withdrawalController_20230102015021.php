<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withdrawalController extends Controller
{
    public function withset() {
        //ログインしているユーザーのid
        $usernumber = Auth::id();
        $user = App\Models\User::find($usernumber);
        dd($user);
        $user->delete();
    }
}
