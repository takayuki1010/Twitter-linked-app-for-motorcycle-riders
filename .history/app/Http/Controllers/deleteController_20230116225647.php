<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class deleteController extends Controller
{

        // 変数作成
        private $users;

        // インスタンス定義　モデルをインスタンス
        public function __construct()
        {
            $this->user = new User();
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //ログインユーザーデータ受け渡し
        return view('withdrawal', compact('user'));   //退会画面へ
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //ユーザー退会(削除)
        // バリデーション
        $params = [
            'withname' => ['required','string','max:10'],
            'withemail' => ['required','string','email'],
            'withpass' => ['required','string','min:6','max:12']
        ];
        $this->validate($request, $params);
        // requestの値を変数へ
        $withname = $request->withname;
        $withemail = $request->withemail;
        $withpass = $request->withpass;

        // ユーザー情報を変数に
        $userdate = Auth::user();
        $username = $userdate->name;
        $useremail = $userdate->email;
        $userpass = $userdate->password;

        // ユーザー情報と入力された値が相違ないか
        if($withname == $username 
        && $withemail == $useremail 
        && Hash::check($withpass, $userpass))
        {
            
            $withdate = $this->user->delete($id);
        }
            return redirect()->back()->with('error', '入力情報が違います。');

    }
}
