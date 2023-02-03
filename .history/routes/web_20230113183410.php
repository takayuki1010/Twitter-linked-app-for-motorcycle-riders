<?php

use Illuminate\Support\Facades\Route;
// コントローラーの場所記載
use App\Http\Controllers\snsController;

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
Route::resource('/', snsController::class)
->missing(function (Request $request) {
    return Redirect::route('photos.index');
});
