<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_Image;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Auth::user()->store->products;
        foreach($products as $key=>$data){
            $products[$key]["category"]=$products[$key]->category;
            $products[$key]["images"]=$products[$key]->images;
    }
        return response()->json($products,200);
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
        $produt=new Product;
        $produt->name=request("name");
        $produt->description=request("description");
        $produt->price=\request("price");
        $produt->amount=\request("amount");
        $produt->category_id=\request("category_id");
        if(Auth::user()->store->products()->save($produt)){
            if(\request("img1")){
                $produt->images()->save(new Product_Image(["base64"=>\request("img1")]));
            }
            if(\request("img2")){
                $produt->images()->save(new Product_Image(["base64"=>\request("img2")]));
            }
            if(\request("img3")){
                $produt->images()->save(new Product_Image(["base64"=>\request("img3")]));
            }
            if(\request("img4")){
                $produt->images()->save(new Product_Image(["base64"=>\request("img4")]));
            }
            return  response()->json("OK",200);

        }else{
            return  response()->json("Error",404);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
