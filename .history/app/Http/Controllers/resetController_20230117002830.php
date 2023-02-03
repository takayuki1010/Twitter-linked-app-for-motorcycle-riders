<?php
//パスワード変更 未完成
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class resetController extends Controller
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
        $id = Auth::id(); //ユーザーid
        $user = User::find($id); //idの人の情報
        return view('reset', compact('user'));
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
        dd($id);
        //バリデーション
        $params = [
            'checkname' => ['required','string','max:10'],
            'checkemail' => ['required','string','email'],
            'checkpass' => ['required','string','min:6','max:12']
        ];
        $this->validate($request, $params);

        // 入力されている内容
        $checkname = $request->checkname;
        $checkemail = $request->checkemail;
        $checkpass = $request->checkpass;

        // 登録している内容
        $user = Auth::user();
        $username = $user->name;
        $useremail = $user->email;

        // 内容が合っていれば
        if($checkname == $username 
        && $checkemail == $useremail)
        {
            $checkdate = $this->user->reset($id, $checkpass);
        }
        // 合っていなければ
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
