<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class deleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //退会画面へ
        return view('withdrawal');
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
    public function destroy($id)
    {
        //ユーザー退会(削除)
        // バリデーション
        dd($id);
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
            return ('できている');
        }

            return ('できてない');

    }
}
