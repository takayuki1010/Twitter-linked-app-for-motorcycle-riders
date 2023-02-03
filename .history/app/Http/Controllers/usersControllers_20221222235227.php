<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\MainUser;

class snsprocess extends Controller
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

    public function 

}