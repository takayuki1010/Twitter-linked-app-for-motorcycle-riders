<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Comment;
use App\Models\message_users;

class detailController extends Controller
{
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
        //detailへの詳細表示。
        //渡ってきたメッセージのIDをmessageテーブルから検索
        $messages = Message::find($id);
        $post = $messages;

        // メッセージIDに紐づいているリレーションで取ってきたユーザー情報
        $users = $messages->usertable;

        //コメントと紐づいているユーザー情報
        $comment_message = $messages->comment_message;

        // コメントのユーザー情報
        $commentuser = $messages->comment_message->usertable;

        dd($commentuser);
        

        // いいね機能
        $like = message_users::where('message_id', $messages->id)->where('user_id', Auth::id())->first();
        
        return view('detail', compact('messages', 'users', 'comment_message', 'commentuser', 'post', 'like'));
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
