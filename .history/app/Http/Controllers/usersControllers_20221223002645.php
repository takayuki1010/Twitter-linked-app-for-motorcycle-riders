<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class regiprocess extends Controller
{
    //

    // プロパティ作成
    private $users;

    public function __construct() {
        // インスタンス定義 モデルのクラスをインスタンス
        $this->users = new Users();
    }

    public function regi_process(Request $request) {
        // 変数にリクエストで渡ってきたnameを入れる
        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;
        $regiimg = $request->regiimg;

        // mainuserテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->mainusers->insertUser($reginame, $regiemail, $regipass, $regiimg);
    }

}