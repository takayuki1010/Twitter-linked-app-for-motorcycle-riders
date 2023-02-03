<?php

use Illuminate\Support\Facades\Route;
// コントローラーの場所記載
use App\Http\Controllers\snsprocess;
use App\Http\Controllers\snscontrollers;
use App\Http\Controllers\userControllers;

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

// 初期画面でここにアクセス
Route::get('/index', 'snscontrollers@index')->name('index');
Route::get('/', 'snscontrollers@index');

Route::get('/toproll', 'snsprocess@toproll')->name('toproll');

// 各ファイルへのアクセス
Route::get('/login', 'snscontrollers@login')->name('login');
Route::get('/register', 'snscontrollers@register')->name('register');
Route::get('regicomp', 'snscontrollers@regicomp')->name('regicomp');
Route::get('/logout', 'snscontrollers@logout')->name('logout');
Route::get('/withdrawal', 'snscontrollers@withdrawal')->name('withdrawal');
Route::get('/post', 'snscontrollers@post')->name('post');
Route::get('/reset', 'snscontrollers@reset')->name('reset');
Route::get('/list', 'snscontrollers@list')->name('list');
Route::get('/changeconp', 'snscontrollers@changeconp')->name('changeconp');
Route::get('/resetend', 'snscontrollers@resetend')->name('resetend');

// 各処理のルート指定
// ログイン
Route::get('/regi_process', 'userController@regi_process')->name('regi_process');
Route::post('/regi_process', 'userController@regi_process')->name('regi_process');

Route::post('/login-comp', 'loginController@logindate')->name('login-comp');

// 投稿について
Route::post('/message_post', 'messageController@post')->name('post_post');

// 削除機能
Route::get('/withcomp', 'snscontrollers@withcomp')->name('withcomp');
Route::post('/withset', 'withdrawalController@withset')->name('withset');

// ユーザー情報変更
Route::get('/change', 'snscontrollers@change')->name('change');
Route::post('/userchangedate', 'changeController@userchange')->name('userchange');

// 投稿詳細
// route::get('/detail', 'snscontrollers@detail')->name('detail');
Route::get('/detail/{id}', 'snscontrollers@detail')->name('detail');

//コメント投稿
Route::get('/detail_post', 'commentController@comment')->name('commentpost');

Route::get('/comment/{id}', 'snscontrollers@comment')->name('comment');

// いいねボタン
Route::post('/like/{messageId}', [LikeController::class, 'store']);
Route::post('/unlike/{messageId}', [LikeController::class, 'destroy']);