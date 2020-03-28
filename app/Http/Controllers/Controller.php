<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Product_Category;
use App\Store;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $newOrderCount=Order::whereHas("store",function ($query){
            $query->where("user_id",3);
        })->where("isNotification",0)->count();
        $orders=Order::whereHas("store",function ($query){
            $query->where("user_id",3);
        })->where("isNotification",0)->get();
        foreach ($orders as $order){
            $order->isNotification=1;
            $order->save();
        }
        return  response()->json(["count"=>$newOrderCount],200);
    }

}
