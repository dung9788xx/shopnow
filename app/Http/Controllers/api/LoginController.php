<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['username' => request('username'), 'password' => request('password'),'active'=>1])){
            $user = Auth::user();
            $user->create_Token();
            return response()->json($user, 200);
        }
        else{
            return response()->json(['error'=>'Unauthors'], 401);
        }

    }
}
