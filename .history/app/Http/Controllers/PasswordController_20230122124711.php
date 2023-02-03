<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
##ここから追加##
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\UserTokenRepositoryInterface;
use App\Http\Requests\SendEmailRequest;
use App\Mail\UserResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;
##ここまで追加##

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
