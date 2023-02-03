<?php
// メッセージ投稿
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;

class messageController extends Controller
{
        // 変数作成
        private $messages;

        // インスタンス定義　モデルをインスタンス
        public function __construct()
        {
            $this->user = new Message();
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
        $user = Auth::user(); //ユーザー情報
        return view('post', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $params = [
            'PostText' => ['required', 'string', 'max:140'],
            'postimg1' => ['nullable','file','image','mimes:jpg,jpeg,png'],
            'postimg2' => ['nullable','file','image','mimes:jpg,jpeg,png']
        ];
        $this->validate($request, $params);

        // ユーザーの情報
        $user = Auth::user();
        $userId = $user->id; //ユーザーid

        // 入力した情報
        $posttext = $request->PostText;
        $postImg1 = $request->postimg1;
        $postImg2 = $request->postimg2;

        return 
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
    public function destroy($id)
    {
        //
    }
}
