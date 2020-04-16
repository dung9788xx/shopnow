<?php

namespace App\Http\Controllers\api;

use App\Cart;
use App\Cart_Detail;
use App\Http\Controllers\Controller;
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
                $cart_detail->note = \request("note");
                if ($cart_detail->save()) {
                    return response()->json("OK", 200);
                }
            } else {
                if ($cart->detail()->save(new Cart_Detail(["cart_id" => $cart->cart_id, "product_id" => \request("product_id"),
                    "quantity" => \request("quantity"), "note" => \request("note")]))) {
                    return response()->json("OK", 200);
                }
            }
        } else {
            $cart = Cart::create(["user_id" => Auth::id()]);
            if ($cart->detail()->updateOrCreate(
                ["cart_id" => $cart->cart_id, "product_id" => \request("product_id")],
                ["quantity" => \request("quantity"), "note" => \request("note")])) {
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
}
