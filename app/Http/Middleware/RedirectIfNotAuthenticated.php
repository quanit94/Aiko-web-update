<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Cookie::has('dataFromSever')){
            return $next($request);
        }
        return redirect()->route('get.auth.auth.login')->with('message_error','Phiên làm việc của bạn đã bị hết. Vui lòng đăng nhập lại');
    }
}
