<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changeController extends Controller
{
    //ユーザー情報の更新
    public function userchange(Request $request) {
        // バリデーション
        $params = [
            'changename' => ['required','string', 'max:10'],
            'changeemail' => ['required', 'string', 'email'],
            'changeimg' => ['nullable','file','image', 'mimes:jpeg,png,jpg'],
            'changepass' => ['required', 'string','min:6', 'max:12']
        ];
        $this->validate($request, $params);

        $users = Auth::user();
        $usersid = Auth::id();
        // リクエストパラメータを変数へ
        $changename = $request->changename;
        $changeemail = $request->changeemail;

        // 入力したパスワード取得
        $changepass = $request->changepass;

        // 登録されているパスワードを取得
        $userpass = $users->password;

        // パスワードが合っていれば
        if(Hash::check($changepass, $userpass)) {
            // ページネーション
            // $messages = 
            Message::paginate(3);
            // 情報入力
            $userdate = User::find($usersid);
            $userdate->name = $changename;
            $userdate->email = $changeemail;

            if($request->has('changeimg')) {
                $dir = 'postimg';
                // 画像が入力されていれば
                $originalimgs = $request->file('changeimg')->getClientOriginalName();
                $newname = date('Ymd_His'.'_'.$originalimgs);
                $request->file('changeimg')->storeAs('public/' . $dir, $newname);
                
                $userdate->img = 'storage/' . $dir . '/' . $newname;
                $userdate->save();
                
                return view('list', compact('messages'));
            } else {
                $changeimg = null;
                $userdate->save();
                // 画像ファイルへのパスを取得
                $path = $userdate->img;
                // ファイルが登録されていれば削除
                if ($path !== '') {
                $userdate->delete($path);
                }
            
                return view('list', compact('messages'));
            }
            // $userdate->save();

        } else {
            // dd('入ってないです');
            $errordate = 'false';
            return view('UserChange', compact('errordate', 'users'));
        }
    }
}
