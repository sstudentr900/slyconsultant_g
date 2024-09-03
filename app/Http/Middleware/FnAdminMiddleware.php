<?php

namespace App\Http\Middleware;

use Closure;

class FnAdminMiddleware
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
        //預設不允許存取
        $is_allow = false;
        //取得會員編號
        $user_id = session()->get('fnuser_id');
        
        if(!is_null($user_id))
        {
            //已登入，允許存取
            $is_allow = true;
        }

        if(!$is_allow)
        {
            //若不允許存取，重新導向至首頁
            return redirect()->to('/');
        }


        // return $next($request);
        $response = $next($request);


        //清除cahee
        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
