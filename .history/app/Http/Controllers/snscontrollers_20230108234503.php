<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class snscontrollers extends Controller
{
    //
    public function index() {
        return view('index');
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function regicomp() {
        return view('regicomp');
    }

    // ログアウトしてログイン画面へ
    public function logout() {
        Auth::logout();
        return view('login');
    }

    public function withdrawal() {
        return view('withdrawal');
    }

    public function withcomp() {
        return  redirect()->route('withset');
    }

    public function post() {
        $user = Auth::user();
        return view('post', compact('user'));
    }

    public function change() {
        // ユーザー情報の取得　それを受け渡し
        $users = Auth::user();
        return view('UserChange', compact('users'));
    }

    public function changeconp() {
        return view('changecomp');
    }

    public function detail($id) {
        // ユーザーでーた
        $messages = Message::find($id);
        // 紐づいているuserの名前など
        $userDate = Message::find($id)->userTable;
        // コメントの情報(commentテーブルからの呼び出し)
        $comments = User::find($id)->commentUsers;
        // コメントとユーザー紐付け
        $commnetuser = Comment::find($id)->user;
        // dd($commnetuser->img);
        // dd($userDate);
        return view('detail', compact('messages', 'userDate', 'comments','commnetuser'));
    }

    public function reset() {
        return view('reset');
    }

    public function resetend() {
        return view('resetend');
    }

    public function list() {
        $messages = Message::paginate(3);
        return view('list', compact('messages'));
    }

    public function comment($id) {
        $messages = Message::find($id);
        $userDate = Message::find($id)->userTable;
        return view('comment', compact('messages','userDate'));
    }
}
