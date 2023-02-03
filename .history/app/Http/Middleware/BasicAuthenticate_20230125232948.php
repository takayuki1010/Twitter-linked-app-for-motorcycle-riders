<?php
// Basic認証
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin_user;

class BasicAuthenticate
{
    // ➀
    public const AUTH_USER_NAME = '管理者１';
    public const AUTH_PASSWORD = '222222';
    
    public function handle(Request $request, Closure $next)
    {
        // ➁
        if ($request->adminname !== self::AUTH_USER_NAME
        || $request->adminpass !== self::AUTH_PASSWORD) {
            // ➂
            abort(401, headers: [
                header('WWW-Authenticate: Basic realm="Enter username and password."'),
                header('Content-Type: text/plain; charset=utf-8')
            ]);
        }
        // ➃ 
        return $next($request);
    }
}
