<?php
// Basic認証
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    // ➀
    public const AUTH_USER_NAME = 'hoge';
    public const AUTH_PASSWORD = 'P@ssword';
    
    public function handle(Request $request, Closure $next)
    {
        // ➁
        if ($request->getUser() !== self::AUTH_USER_NAME || $request->getPassword() !== self::AUTH_PASSWORD) {
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
}
