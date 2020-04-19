<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class CheckActive
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
       if($request->expectsJson()){
           $user=User::where("api_token","=",$request->bearerToken())->first();
           if($user!=null){
               if($user->level==1||$user->level==3){
                   if($user->active==1){
                       return $next($request);
                   }else{
                       return response()->json("Tài khoản của bạn đã bị khóa vui lòng liên hệ : "
                           .User::where("username","=","admin")->first()->phone, 401);
                   }

               }else{
                   if($user->store->approval==0){
                       return response()->json("Tài khoản của bạn đang chờ phê duyệt !", 401);
                   }else
                       if($user->store->blocked==1){
                           return response()->json("Tài khoản của bạn đã bị khóa vui lòng liên hệ : "
                               .User::where("username","=","admin")->first()->phone, 401);
                       }else{
                           return $next($request);
                       }
               }

           }
           else{
               return response()->json("Kiểm tra lại thông tin tài khoản!", 404);
           }

       }
        return $next($request);
    }
}
