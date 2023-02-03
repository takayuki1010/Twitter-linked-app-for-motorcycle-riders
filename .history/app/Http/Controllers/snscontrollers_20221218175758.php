<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // ログアウトでセッションを消してログイン画面へ
    public function logout() {
        if(!session() === null) {
            session()->flush();
        }
        return redirect('login');
    }

    public function withdrawal() {
        return view('withdrawal');
    }

    public function withcomp() {
        return view('withcomp');
    }

    public function post() {
        return view('post');
    }

    public function change() {
        return view('UserChange');
    }

    public function changeconp() {
        return view('changecomp');
    }

    public function detail() {
        return view('detail');
    }

    public function reset() {
        return view('reset');
    }

    public function list() {
        return view('list');
    }

    public function comment() {
        return view('comment');
    }
}
