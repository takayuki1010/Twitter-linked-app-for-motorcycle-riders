<?php
// Basic認証
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin_user;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->adminUser;
        $password = $request->adminpass;

        $admin = Admin_user::all();
        $adminpass = $admin->password;

        dd($adminpass);
        if ($username == '管理者１' && Hash::check($password, $adminpass)) {
            return $next($request);
        }

        abort(401, "Enter username and password.", [
            header('WWW-Authenticate: Basic realm="Sample Private Page"'),
            header('Content-Type: text/plain; charset=utf-8')
        ]);
    }
}
