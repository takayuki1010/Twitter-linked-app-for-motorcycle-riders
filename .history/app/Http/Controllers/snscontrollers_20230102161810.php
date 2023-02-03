<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
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

    public function detail() {
        $messagetext = Message::all();
        return view('detail', compact('messagetext'));
    }

    public function reset() {
        return view('reset');
    }

    public function resetend() {
        return view('resetend');
    }

    public function list() {
        return view('list');
    }

    public function comment() {
        return view('comment');
    }
}
