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
        // バリデーション
        $params = $request->validate([
            'reginame' => ['required', 'unique:mainusers,name','string', 'max:10'],
            'regiemail' => ['required', 'email'],
            'regipass' => ['required', 'string','min:6', 'max:12'],
            'regiimg' => ['nullable','mimes:jpeg,png']
        ]);

        $this->validate($request, $params);

        // mainuserテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->users->insertUser($reginame, $regiemail, $regipass, $regiimg);

        return redirect('regicomp');
    }

}
