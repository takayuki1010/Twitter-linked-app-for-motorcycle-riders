<?php

use Illuminate\Support\Facades\Route;
// コントローラーの場所記載
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\snsController;
use App\Http\Controllers\loginreadyController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\regicompController;
use App\Http\Controllers\listController;
use App\Http\Controllers\changeController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\resetController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\commentindexController;
use App\Http\Controllers\message_usersController;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ログインしてるか確認するのは　「->middleware('auth')」　これを後ろに追加

// indexへ遷移
Route::resource('/index', snsController::class)->only([
    'index'
]);
Route::resource('/', snsController::class)->only([
    'index'
]);

// 管理者コントローラ
Route::middleware('auth.basic')->group(function(){
    Route::get('/aaaadminzzz', function () {
        return redirect()->route('list.index');
    });
});

// loginreadyへ遷移
Route::resource('/login', loginreadyController::class);

// login時の操作について
Route::resource('/list', listController::class);

// logout処理、操作
Route::resource('/logout', logoutController::class)->only(
    'index'
);

// registerへ遷移
Route::resource('/register', registerController::class)->only([
    'index'
]);

// regicompへ遷移
Route::resource('/regicomp', regicompController::class)->only([
    'store'
]);

// ユーザー情報変更
Route::resource('/change', changeController::class);

//ユーザー退会(削除)
Route::resource('/delete', deleteController::class);

// メッセージ投稿
Route::resource('/message', messageController::class);

//メッセージ詳細
Route::resource('/detail', detailController::class)->only([
    'show'
]);

//コメント投稿
Route::get('/commentindex/{id}', 'commentindexController@commentindex')->name('commentindex');
Route::resource('/comment', commentController::class);

// いいね機能
Route::get('/reply/like/{post}', 'message_usersController@like')->name('like');
Route::get('/reply/unlike/{post}', 'message_usersController@unlike')->name('unlike');

// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});

// 確認するのに使うルート
Route::get('/admin', function(){
    return view('admin');
});