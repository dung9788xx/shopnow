<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Category;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $users=User::has("store")->get();
        foreach ($users as $key=>$data){
            $users[$key]["store"]=$users[$key]->store;
            $users[$key]["store"]['location']=$users[$key]->store->location;
        }
        return response()->json($users,200);


    }
}
