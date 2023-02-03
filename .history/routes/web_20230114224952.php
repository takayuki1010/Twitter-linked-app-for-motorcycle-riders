<?php

use Illuminate\Support\Facades\Route;
// コントローラーの場所記載
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\snsController;
use App\Http\Controllers\loginController;

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

// loginへ遷移
Route::resource('/login', loginController::class);

// registerへ遷移
Route::resource('/register', registerController::class);





