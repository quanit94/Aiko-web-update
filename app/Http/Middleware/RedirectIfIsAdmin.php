<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class RedirectIfIsAdmin
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
        if(Cookie::has('dataFromSever')){// Kiểm tra nếu người dùng sau khi đã login thành công.
            $dataFromSever = Cookie::get('dataFromSever');
            if($dataFromSever['data']['role']['admin'] == 1){
                return $next($request);
            }elseif($dataFromSever['data']['role']['partner'] == 1) {
                return redirect()->route('get.partner.home.dashboard_01');
            }else{
                $cookie = Cookie::forget('dataFromSever');
                session_start();
                session_destroy();
                return redirect()->route('get.auth.auth.login')->withCookie($cookie)->with('message_error','Bạn không có quyền truy cập vào dành cho người quản lý');
            }
        }
        return redirect()->route('get.auth.auth.login')->with('message_error','Phiên làm việc của bạn đã bị hết. Vui lòng đăng nhập lại');
    }
}
