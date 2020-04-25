<?php

namespace App\Http\Controllers\api;

use App\Cart;
use App\Cart_Detail;
use App\Http\Controllers\Controller;
use App\Location;
use App\Order;
use App\Order_Detail;
use App\Product;
use App\User;
use  Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function getCartByUserId()
    {
        $cart = Cart::where("user_id", Auth::id())->firstOrFail();
        $cart["detail"] = $cart->detail;
        foreach ($cart->detail as $key => $data) {
            $cart->detail[$key]["product"] = Product::find($cart->detail[$key]->product_id);
            $cart->detail[$key]["product"]["images"] = [Product::find($cart->detail[$key]->product_id)->images[0]];
            $cart->detail->makeHidden(["product_id"]);
        }

        return response()->json($cart, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addProductToCart()
    {
        if (Cart::where("user_id", Auth::id())->get()->count() > 0) {
            $cart = Cart::where("user_id", Auth::id())->get()[0];
            if ($cart->detail()->where("product_id", \request("product_id"))->get()->count() > 0) {
                $cart_detail = Cart_Detail::where("cart_id", $cart->cart_id)->where("product_id", \request("product_id"))->get()[0];
                $cart_detail->quantity = $cart_detail->quantity + \request("quantity");
                $cart_detail->price=\request("price");
                $cart_detail->note = \request("note");
                if ($cart_detail->save()) {
                    return response()->json("OK", 200);
                }
            } else {
                if ($cart->detail()->save(new Cart_Detail(["cart_id" => $cart->cart_id, "product_id" => \request("product_id"),
                    "quantity" => \request("quantity"),"price"=>\request("price"), "note" => \request("note")]))) {
                    return response()->json("OK", 200);
                }
            }
        } else {
            $cart = Cart::create(["user_id" => Auth::id()]);
            if ($cart->detail()->updateOrCreate(
                ["cart_id" => $cart->cart_id, "product_id" => \request("product_id")],
                ["quantity" => \request("quantity"),"price"=>\request("price"), "note" => \request("note")])) {
                return response()->json("OK", 200);
            }
        }
        return response()->json("ERROR", 404);

    }

    public function updateCart()
    {
        $cart = Cart::where("user_id", Auth::id())->get()[0];
        $cart_details=is_array(\request("data"))?\request("data"):json_decode(\request("data"),true);
        $cart->detail()->delete();
        if(count($cart_details)>0){
        foreach ($cart_details as $key => $data) {
            $cart->detail()->save(new Cart_Detail($data));
        }}else{
            $cart->delete();
        }

        return response()->json("OK",200);
    }

    public function getShippingInfo()
    {
        $location=Location::whereHas("user",function ($query){
            $query->where("id",Auth::id());
        })->firstOrFail();
        $location["phone"]=User::find(Auth::id())->phone;
        return response()->json($location,200);
    }
    public function placeOrder()
    {
        $cart = Cart::with("detail")->where("user_id",Auth::id())->first();
        $orders_saved = collect();
        foreach ($cart->detail as $key => $data) {
            if (!$orders_saved->contains('store_id', $data->product->store->store_id)) {
                $order = new Order;
                $order->store_id = $data->product->store->store_id;
                $order->user_id = $cart->user_id;
                $order->shipping_address =  \request("address");
                $order->shipping_phone = \request("phone");
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
        if($orders_saved->count()>1){
            return response()->json("Đặt hàng thành công, do bạn đặt ".$orders_saved->count()." cửa hàng khác nhau nên sẽ được chia thành ".$orders_saved->count()." đơn hàng.",200);
        }else{
            return response()->json("Đặt hàng thành công !",200);
        }
    }
}
