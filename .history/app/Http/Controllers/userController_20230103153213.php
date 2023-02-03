<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Image;

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
            'regiimg' => ['nullable','file','image','mimes:jpeg,png,jpg']
        ];
        $this->validate($request, $params);

        // 画像のファイル名を取得
        $dir = 'img'; 
        if($request->has('regiimg')) {
        $regiimgspost = $request->file('regiimg')->getClientOriginalName();
        $newname = date('Ymd_His'.'_'.$regiimgspost);
        $request->file('regiimg')->storeAs('public/' . $dir, $newname);

        // ファイル情報をDBに保存
        $image = new Image();
        $image->imgName = $regiimgspost;
        $image->imgPath = 'storage/' . $dir . '/' . $newname;
        $image->save();
        $regiimg = $image->imgPath;
        } else {
            $regiimg = null;
        }

        // 変数にリクエストで渡ってきたnameを入れる
        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;
        // $regiimg = $request->regiimg;

        // // usersテーブルに登録処理 モデルに記載した関数を入力
        $users = $this->users->insertUser($reginame, $regiemail, $regipass, $regiimg);

        return redirect()->route('regicomp');
    }

}
