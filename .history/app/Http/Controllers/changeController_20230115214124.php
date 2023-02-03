<?php
// ユーザー情報更新関係
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class changeController extends Controller
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
        //
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
        //ユーザー情報変更画面へ遷移
        $id = Auth::id(); //ユーザーid
        $user = User::find($id); //idの人の情報
        return view('UserChange', compact('user'));
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
        //ユーザー情報更新
        $params = [
            'changename' => ['required','string','max:10'],
            'changeemail' => ['required','string','email'],
            'changeimg' => ['nullable','file','image','mimes:jpg,jpeg,png'],
            'changepass' => ['required','string','min:6','max:12'],
        ];
        $this->validate($request, $params);
        // 取ってきている内容
        $loginname = $request->changename;
        $loginemail = $request->changeemail;
        $loginimg = $request->changeimg;
        $loginpass = $request->changepass;
        // ユーザーの情報
        $users = Auth::user(); //ログインしているユーザー
        $userid = Auth::id(); //ユーザーid
        $userpass = $users->password; //ユーザーのパスワード取得
        // 入力されたパスワードが合っていれば
        if(Hash::check($loginpass, $userpass))
        {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
