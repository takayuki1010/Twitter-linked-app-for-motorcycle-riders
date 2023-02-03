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

        // 画像１があるか
        if($request->has('postimg1'))
        { //入っていれば名前をつけ保存
            $postimgname1 = $request->file('postimg1')->getClientOriginalName();
            $imgnewname1 = date('Ymd_His'.'_'.$postimgname1);
            $postImg1 = $request->file('postimg1')->storeAs('public/img', $imgnewname1);
        } else {
            $postImg1 = null;
        }

        // 画像２があるか,入っている場合１がしっかり入っているか
        if($request->has('postimg2'))
        { //入っていれば名前をつけ保存
                if($request->has('postimg1')) //２が入っているのに１が入っていない
                {
                    return redirect()->back()->with('error', '上から画像を入力してください。'):
                }
            $postimgname2 = $request->file('postimg2')->getClientOriginalName();
            $imgnewname2 = date('Ymd_His'.'_'.$postimgname2);
            $postImg2 = $request->file('postimg2')->storeAs('public/img', $imgnewname2);
        } else {
            $postImg2 = null;
        }

        return ('umakuitteru');
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