<?php
//館員登録完了
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class regicompController extends Controller
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
        // バリデーション
        $params = [
            'reginame' => ['required','string','unique:users,name','max:10'],
            'regiemail' => ['required','string','unique:users,email','email'],
            'regipass' => ['required','regex:/^[0-9a-zA-z-_]{6,12}$/'],
            'regiimg' => ['nullable','file','image','mimes:jpg,jpeg,png'],
        ];
        $this->validate($request, $params);

        $reginame = $request->reginame;
        $regiemail = $request->regiemail;
        $regipass = $request->regipass;

        if($request->has('regiimg'))
        {
            $regiimgname = $request->file('regiimg')->getClientOriginalName();
            $imgnewname = date('Ymd_His'.'_'.$regiimgname);
            $regiimgDate = $request->file('regiimg')->storeAs('public/img', $imgnewname);
            $regiimg = 'storage/img/' . $imgnewname;
            
        } else {
            $regiimg = null;
        }

        $usersdate = $this->user->insert(
            $reginame, $regiemail, $regipass, $regiimg
        );

        return view('regicomp');
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
