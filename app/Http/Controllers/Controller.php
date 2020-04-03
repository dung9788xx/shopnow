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
        $orders=Order::whereHas("store",function (Builder $query){
            $query->where("user_id",3);
        })->with(["detail","status","user"])->get();
        return  response()->json($orders,200);

        return  response()->json($orders,200);
    }

}
