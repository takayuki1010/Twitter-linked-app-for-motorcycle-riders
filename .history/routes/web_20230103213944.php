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

route::get('/toproll', 'snsprocess@toproll')->name('toproll');

// 各ファイルへのアクセス
Route::get('/login', 'snscontrollers@login')->name('login');
Route::get('/register', 'snscontrollers@register')->name('register');
route::get('regicomp', 'snscontrollers@regicomp')->name('regicomp');
Route::get('/logout', 'snscontrollers@logout')->name('logout');
route::get('/withdrawal', 'snscontrollers@withdrawal')->name('withdrawal');
route::get('/post', 'snscontrollers@post')->name('post');
route::get('/reset', 'snscontrollers@reset')->name('reset');
route::get('/list', 'snscontrollers@list')->name('list');
route::get('/comment', 'snscontrollers@comment')->name('comment');
route::get('/changeconp', 'snscontrollers@changeconp')->name('changeconp');
route::get('/resetend', 'snscontrollers@resetend')->name('resetend');

// 各処理のルート指定
// ログイン
route::get('/regi_process', 'userController@regi_process')->name('regi_process');
route::post('/regi_process', 'userController@regi_process')->name('regi_process');

route::post('/login-comp', 'loginController@logindate')->name('login-comp');

// 投稿について
route::post('/message_post', 'messageController@post')->name('post_post');

// 削除機能
route::get('/withcomp', 'snscontrollers@withcomp')->name('withcomp');
route::post('/withset', 'withdrawalController@withset')->name('withset');

// ユーザー情報変更
route::get('/change', 'snscontrollers@change')->name('change');
route::post('/userchangedate', 'changeController@userchange')->name('userchange');

// 投稿詳細
// route::get('/detail', 'snscontrollers@detail')->name('detail');
Route::get('/detail', 'snscontrollers@detail')->name('detail');

// いいねボタン
