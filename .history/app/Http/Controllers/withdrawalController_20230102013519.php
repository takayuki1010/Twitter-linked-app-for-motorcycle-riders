<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withdrawalController extends Controller
{
    public function 
    //ログインしているユーザーのid
    $usernumber = Auth::id();

    $user = App\User::find($usernumber);
    $user->delete();

}
