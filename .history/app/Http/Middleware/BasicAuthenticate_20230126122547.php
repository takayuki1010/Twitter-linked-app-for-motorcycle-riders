<?php
// Basic認証
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicAuthenticate
{
    //
    public const AUTH_USER_NAME = '管理者１';
    public const AUTH_PASSWORD = '222222';
    
    public function handle(Request $request, Closure $next)
    {
        //
        if ($request->getUser() !== self::AUTH_USER_NAME || $request->getPassword() !== self::AUTH_PASSWORD) {
            //
            abort(401, headers: [
                header('WWW-Authenticate: Basic realm="Enter username and password."'),
                header('Content-Type: text/plain; charset=utf-8')
            ]);
        }
        //
        $useradmin = $request->session()->put('test', 'テスト');
        return $next($request, compact('useradmin'));
    }
}
