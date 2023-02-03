<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class messageController extends Controller
{
    //
        // プロパティ作成
        private $messages;

        public function __construct() {
            // インスタンス定義 モデルのクラスをインスタンス
            $this->messages = new message();
        }

    public function post(Request $request) {
        // バリデーション
        $params = [
            'PostText' => ['required','string', 'max:140'],
            'postimg' => ['nullable','file','image','mimes:jpeg,png,jpg']
        ];
        $this->validate($request, $params);

        // ログインユーザーのid
        $messid = Auth::id();
        $message = $request->PostText;

        $img = 'postimg';
        if($request->has('postimg1')) {
            $messpostimgs1 = $request->file('postimg1')->getClientOriginalName();
            // 画像を二つ保存
            $newname1 = date('Ymd_His'.'_'.$messpostimgs1);
            $request->file('postimg1')->storeAs('public/' . $img, $newname1);
    
            // ファイル情報をDBに保存
            $image = new Image();
            $image->imgName = $messpostimgs1;
            $image->imgPath = 'storage/' . $img . '/' . $newname1;
            $image->save();

            $messimg1 = $image->imgPath;

            } else {
                $messimg1 = null;
            }
            //一つ目投稿終わり

            // 二つ目保存
        if($request->has('postimg1') && $request->has('postimg2')) {

            $messpostimgs2 = $request->file('postimg2')->getClientOriginalName();
            $newname2 = date('Ymd_His'.'_'.$messpostimgs2);
            $request->file('postimg2')->storeAs('public/' . $img, $newname2);

            $image = new Image();
            $image->imgName = $messpostimgs2;
            $image->imgPath = 'storage/' . $img . '/' . $newname2;
            $image->save();
            $messimg2 = $image->imgPath;
            } else {
                $messimg2 = null;
            }
            //二つ目投稿終わり
        $message_date = $this->messages->insertMessage($messid, $message, $messimg1, $messimg2);

        // データベースの情報を表示するため記入
        $messages = Message::paginate(3);
        
        // DB::table('messages')->Paginate(3);

        //外部キーで外部キーで取ってきているユーザー名を表示。
        // $messnames = User::with('userDate')->get();

        return view('list', compact('messages'
        // ,'detail'
        // 'messnames'
    )); //これは変える　Twitterへ投稿できるようにする。
    }
}
