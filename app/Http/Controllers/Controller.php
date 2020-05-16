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
        $cart = Cart::where("user_id", 2)->with(["detail" => function ($query) {
            $query->join("product","product.product_id","=","cart_detail.product_id")->whereRaw("product.amount-quantity >= 0 ");
        }])->get()->first();
        foreach ($cart->detail as $key => $data) {
               $data->delete();
        }
        $cart->fresh();
        echo $cart->count();
        if($cart->count()<0){
            $cart->delete();
        }
       return response()->json($cart, 200);
    }
}
