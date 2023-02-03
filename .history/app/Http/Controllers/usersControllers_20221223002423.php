<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\MainUser;

class regiprocess extends Controller
{
    //

//     public function __construct() {
//         // インスタンス化
//         $user = new Users;
//     }

//     public function regi_process(Request $request) {
//         // バリデーション
//         $validate_list = [
//             'reginame' => 'required|string|max:10',
//             'regiemail' => 'required|email',
//             'regipass' => 'required|string',
//             'regiimg' => 'image'
//         ];
//         $this->validate($request, $validate_list);

//         // 渡された値を保存
//         $params = [
//             'name' => $request->reginame,
//             'email' => $request->regiemail,
//             'pass' => $request->regipass,
//             'img' => $request->regiimg
//         ];

//         return redirect('regicomp');
//     }
// }

    // プロパティ作成
    private $users;

    public function __construct() {
        // インスタンス定義 モデルのクラスをインスタンス
        $this->users = new Users();
    }

    public function register_process(Request $request) {
        // 変数にリクエストで渡ってきたnameを入れる
        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;
        $regiimg = $request->regiimg;

        // mainuserテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->mainusers->insertUser($reginame, $regiemail, $regipass, $regiimg);
    }

}