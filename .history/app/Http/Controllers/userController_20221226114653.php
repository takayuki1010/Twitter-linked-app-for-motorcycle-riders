<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    //
     // プロパティ作成
    private $users;

    public function __construct() {
        // インスタンス定義 モデルのクラスをインスタンス
        $this->users = new user();
    }

    public function regi_process(Request $request) {
        // dd($request->all());
        // バリデーション
        $params = [
            'reginame' => ['required', 'unique:users,name','string', 'max:10'],
            'regiemail' => ['required','unique:users,email', 'email'],
            'regipass' => ['required', 'string','min:6', 'max:12'],
            'regiimg' => ['file','image', 'mimes:jpeg,png,jpg']
        ];
        $this->validate($request, $params);

        // 画像のファイル名を取得
        // $regiimg = $request->regiimg->getClientOriginalName();

        if($request->has('regiimg')){
        $regiimg = $request->regiimg->store('public/images');

        // // ファイル情報をDBに保存
        $image = new Image();
        $image->imgName = $regiimg;
        $image->imgPath = 'public/' . $regiimg;
        $image->save();
        } else {
            $regiimg = $request->regiimg;
        }


        // 変数にリクエストで渡ってきたnameを入れる
        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;
        // $regiimg = $request->regiimg;

        // usersテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->users->insertUser($reginame, $regiemail, $regipass, $regiimg);

        return redirect()->route('regicomp');
    }

}
