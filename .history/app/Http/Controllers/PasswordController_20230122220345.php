<?php
// パスワード再設定コントローラ１
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

    private $userRepository;
    private $userTokenRepository;

    private const MAIL_SENDED_SESSION_KEY = 'user_reset_password_mail_sended_action';

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserTokenRepositoryInterface $userTokenRepository,
    )
    {
        $this->userRepository = $userRepository;
        $this->userTokenRepository = $userTokenRepository;
    }

    /**
    * パスワード再設定メール送信フォームページ
    *
    * @return \Illuminate\Contracts\View\View
    */
    public function emailFormResetPassword()
    {
        return view('reset');
    }

    /**
    * ユーザーのパスワード再設定メール送信
    *
    * @param SendEmailRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function sendEmailResetPassword(SendEmailRequest $request)
    {   
        try {
            $user = $this->userRepository->findFromEmail($request->email);
            $userToken = $this->userTokenRepository->updateOrCreateUserToken($user->id);
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信します。');
            Mail::send(new UserResetPasswordMail($user, $userToken));
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信しました。');
        } catch(Exception $e) {
            Log::error(__METHOD__ . '...ユーザーへのパスワード再設定用メール送信に失敗しました。 request_email = ' . $request->email . ' error_message = ' . $e);
            return redirect()->route('user.password_reset.email_form')
                ->with('flash_message', '処理に失敗しました。時間をおいて再度お試しください。');
        }
        // メール送信完了画面への不正アクセスを防ぐためのセッションキー
        session()->put(self::MAIL_SENDED_SESSION_KEY, 'user_reset_password_send_email');

        return redirect()->route('password_reset.email.send_complete');
    }

    /**
    * ユーザーのパスワードリセットメール送信完了ページ
    *
    * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    */
    public function sendComplete()
    {
       // メール送信処理で保存したセッションキーに値がなければアクセスできないようにすることで不正アクセスを防ぐ
        if (session()->pull(self::MAIL_SENDED_SESSION_KEY) !== 'user_reset_password_send_email') {
            return redirect()->route('password_reset.email.form')
                ->with('flash_message', '不正なリクエストです。');
        }

        return view('user.reset_password.send_complete');
    }
}
