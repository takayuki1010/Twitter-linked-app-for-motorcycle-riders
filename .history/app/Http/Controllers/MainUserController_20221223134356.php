<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainUser;

class MainUserController extends Controller
{
    //
     // プロパティ作成
    private $users;

    public function __construct() {
        // インスタンス定義 モデルのクラスをインスタンス
        $this->users = new MainUser();
    }

    public function regi_process(Request $request) {
        // 変数にリクエストで渡ってきたnameを入れる
        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;
        $regiimg = $request->regiimg;

        $params = $request->validate([
            'regineme' => ['required', 'unique:posts', 'max:255'],
            'regiemail' => ['required', 'email'],
            'regipass' => ['required', 'string', 'max:10'],
            'regiimg' => ['nullable','mimes:jpeg,png']
        ]);


        // mainuserテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->users->insertUser($reginame, $regiemail, $regipass, $regiimg);
    }

}
