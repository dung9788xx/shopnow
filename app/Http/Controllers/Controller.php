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
        $cart = Cart::with("detail")->find(1);
        $orders_saved = collect();
        foreach ($cart->detail as $key => $data) {
            if (!$orders_saved->contains('store_id', $data->product->store->store_id)) {
                $order = new Order;
                $order->store_id = $data->product->store->store_id;
                $order->user_id = $cart->user_id;
                $order->shipping_address = "Ship CC";
                $order->shipping_phone = "113";
                $order->date = date("d/m/Y");
                $order->save();
                $order_detail = new Order_Detail;
                $order_detail->order_id = $order->order_id;
                $order_detail->product_id = $data->product_id;
                $order_detail->name = $data->product->name;
                $order_detail->price = $data->product->price;
                $order_detail->quantity = $data->quantity;
                $order_detail->note = $data->note;
                $order_detail->save();
                $orders_saved->push(["store_id" => $data->product->store->store_id, "order_id" => $order->order_id]);
            } else {
                $result = $orders_saved->firstWhere("store_id", $data->product->store->store_id);
                $order = Order::find($result["order_id"]);
                $order_detail = new Order_Detail();
                $order_detail->order_id = $order->order_id;
                $order_detail->product_id = $data->product_id;
                $order_detail->name = $data->product->name;
                $order_detail->price = $data->product->price;
                $order_detail->quantity = $data->quantity;
                $order_detail->note = $data->note;
                $order_detail->save();
            }

        }
        $cart->detail()->delete();
        $cart->delete();

    }
}
