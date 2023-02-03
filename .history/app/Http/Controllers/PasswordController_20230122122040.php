<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
    * パスワード再設定メール送信フォームページ
    *
    * @return \Illuminate\Contracts\View\View
    */
    public function emailFormResetPassword()
    {
        return view('reset');
    }
}
