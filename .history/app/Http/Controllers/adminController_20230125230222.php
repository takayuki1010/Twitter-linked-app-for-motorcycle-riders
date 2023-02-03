<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin_user;

class adminController extends Controller
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
               // ログイン機能
        $params = [
            'adminname' => ['required','string','max:10'],
            'adminpass' => ['required','string','min:6','max:12'],
        ];
        $this->validate($request, $params);

        // 情報を変数へ入れ、それを更にデータベース上の名前
        // と同じ名前に連想配列として入力
        $adminname = $request->adminname;
        $adminpass = $request->adminpass;

        $listDate = [
            'name' => $listname,
            'password' => $listpass
        ];
        // ログインに成功した時
        if (Auth::attempt($listDate)) {
            $request->session()->regenerate();
            // 上記がうまく行っていればルートのindexへ移動し、そこからリストへ。
            return redirect()->route('list.index');
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
