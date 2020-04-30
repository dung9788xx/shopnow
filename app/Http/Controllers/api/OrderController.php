<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_Detail;
use App\Store;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::whereHas("store",function (Builder $query){
            $query->where("user_id",Auth::id());
        })->with(["detail","status","user"])->get();
        return  response()->json($orders,200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNewOrderNotification()
    {
        $newOrderCount=Order::whereHas("store",function ($query){
            $query->where("user_id",Auth::id());
        })->where("isNotification",0)->count();
        $orders=Order::whereHas("store",function ($query){
            $query->where("user_id",Auth::id());
        })->where("isNotification",0)->get();
        foreach ($orders as $order){
            $order->isNotification=1;
            $order->save();
        }
        return  response()->json(["count"=>$newOrderCount],200);
    }

    public function getOrderByUser()
    {
        $orders=Order::where("user_id",Auth::id())->get();
        foreach ($orders as $key=>$data){
            $amount=0;
            foreach ($data->detail   as $key1=>$data1){
                $amount=$amount+($data1->quantity*$data1->price);
            }
            $user=new User;
            $user->id=$amount;
            $user->name=Auth::user()->name;
            $orders[$key]["user"]=$user;
            $orders[$key]["status"]=$data->status;
        }
        return response()->json($orders,200);
    }

    public function getOrderDetail($order_id)
    {
        $order_details=Order_Detail::where("order_id",$order_id)->get();
        return response()->json($order_details,200);
    }

    public function declineOrder($id)
    {
        $order=Order::findOrFail($id);
        $order->status_id=4;
        $order->save();
        return response()->json("OK",200);
    }

    public function acceptOrder($id)
    {
        $order=Order::findOrFail($id);
        $order->status_id=2;
        $order->save();
        return response()->json("OK",200);
    }

    public function cancelOrder($id)
    {
        $order=Order::findOrFail($id);
        $order->status_id=5;
        $order->save();
        return response()->json("OK",200);
    }
    public function receivedOrder($id)
    {
        $order=Order::findOrFail($id);
        $order->status_id=3;
        $order->save();
        return response()->json("OK",200);
    }
}
