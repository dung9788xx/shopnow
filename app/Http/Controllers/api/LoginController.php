<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $user=User::where("username","=",request('username'))->first();
        if($user!=null){
            if($user->level==1||$user->level==3){
                if($user->active==1){
                    if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
                        $user->create_Token();
                        return response()->json($user, 200);
                    }else{
                       return response()->json("Kiểm tra lại thông tin tài khoản!", 404);
                    }
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
                       if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
                           $user->create_Token();
                           return response()->json($user, 200);
                       }else{
                           return response()->json("Kiểm tra lại thông tin tài khoản!", 404);
                       }
                   }
            }

        }
        else{
            return response()->json("Kiểm tra lại thông tin tài khoản!", 404);
        }

    }
}
