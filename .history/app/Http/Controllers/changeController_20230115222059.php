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
            'changename' => ['required','string','unique:users,name','max:10'],
            'changeemail' => ['required','string','unique:users,email','email'],
            'changeimg' => ['nullable','file','image','mimes:jpg,jpeg,png'],
            'changepass' => ['required','string','min:6','max:12'],
        ];
        $this->validate($request, $params);
        // 取ってきている内容
        $loginname = $request->changename;
        $loginemail = $request->changeemail;
        $loginpass = $request->changepass;

        // 画像が選択されていれば
        if($request->has('changeimg'))
        {
            $changeimgname = $request->file('changeimg')->getClientOriginalName();
            $imgnewname = date('Ymd_His'.'_'.$changeimgname);
            $loginimg = $request->file('regiimg')->storeAs('public/img', $imgnewname); //入力されているものを変数へ
            
        } else {
            $loginimg = null; //なければnull
        }

        // ユーザーの情報
        $users = Auth::user(); //ログインしているユーザー
        $id = Auth::id(); //ユーザーid
        $userpass = $users->password; //ユーザーのパスワード取得
        // 入力されたパスワードが合っていれば
        if(Hash::check($loginpass, $userpass))
        {
            $userUpdate = $this->user->userupdate(
                $userid, $loginname, $loginemail, $loginimg
            );
            return view('list.index');
        }

            return redirect()->back()->with('error', '入力されているパスワードが違います。');
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
