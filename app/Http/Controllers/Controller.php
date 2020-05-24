<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cart_Detail;
use App\Order;
use App\Order_Detail;
use App\Product;
use App\Product_Category;
use App\Province;
use App\Repositories\UserRepository;
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
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $id=1;
        $users = User::whereHas("store",function ($query) use ($id){
            $query->where("store_id",$id);
        })->first();
        $users["store"] = $users->store;
        $users["location"] = $users->location;
        $users["location"]["province"] = $users->location->province;
        $users["location"]["district"] = $users->location->district;
        $users["location"]["ward"] = $users->location->ward;
        return response()->json($users, 200);
    }
}
