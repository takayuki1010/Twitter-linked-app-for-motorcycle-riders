<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $withname = $request->withname;
        $withemail = $request->withemail;
        $withpass = $request->withpass;

        // $params = [
        //     'name' = $withname,
        //     'email' = $withemail,
        //     'password' = $withpass
        // ];
        // // ログイン情報が間違いないか
        // if()
        //ログインしているユーザーのid
        $usersname = Auth::user()->name;
        $usersemail = Auth::user()->email;
        $userspass = Auth::user()->password;

        // dd($test);
        if($withname === $usersname 
        && $withemail === $usersemail 
        // ハッシュ化したものと入力したものが同じか確認
        && Hash::check($withpass, $userspass)) {
            dd('大丈夫です');
        } else {
            dd('違います');
        }

        $usernumber = Auth::id();
        $user = User::find($usernumber);
        // dd($user);
        // $user->delete();

        return view('index');
    }
}
