<?php
// ログイン画面からlistへの遷移に仕様
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list');
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
            'loginname' => ['required','string','max:10'],
            'loginpass' => ['required','string','min:6','max:12'],
        ];
        $this->validate($request, $params);

        // 情報を変数へ入れ、それを更にデータベース上の名前
        // と同じ名前に連想配列として入力
        $listname = $request->loginname;
        $listpass = $request->loginpass;

        $listDate = [
            'name' => $listname,
            'password' => $listpass
        ];
        // ログインに成功した時
        if (Auth::attempt($listDate)) {
            $request->session()->regenerate();
            // 上記がうまく行っていればルートのindexへ移動し、そこからリストへ。
            return redirect()->route('list.index');
        } else {
            // 入力した情報がデータベースになければ
            $login = 'false';
            return view('login',compact('login'));
        }
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
