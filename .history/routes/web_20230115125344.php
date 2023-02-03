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

// loginreadyへ遷移
Route::resource('/login', loginreadyController::class);

// login時の操作について
Route::resource('/list', listController::class);

// logout処理、操作
Route::resource('/logout', logoutController::class)->onlu(
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







