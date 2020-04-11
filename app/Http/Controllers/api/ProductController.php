<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_Image;
use App\Store;
use App\Exceptions\ApiException;
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
    protected function saveImgBase64($param, $folder)
    {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('public');
        $checkDirectory = $storage->exists($folder);
        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');

        return $fileName;
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
        $product=new Product;
        $product->name=request("name");
        $product->description=request("description");
        $product->price=\request("price");
        $product->amount=\request("amount");
        $product->category_id=\request("category_id");
        if(Auth::user()->store->products()->save($product)){
            if(\request("img1")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img1"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img2")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img2"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img3")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img3"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img4")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img4"),"productimage/".$product->product_id."/")]));
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
        $product->name=request("name");
        $product->description=request("description");
        $product->price=\request("price");
        $product->amount=\request("amount");
        $product->category_id=\request("category_id");
        if($product->save()){
            $product->images()->delete();
            Storage::deleteDirectory("public/productimage/".$product->product_id);
            if(\request("img1")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img1"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img2")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img2"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img3")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img3"),"productimage/".$product->product_id."/")]));
            }
            if(\request("img4")){
                $product->images()->save(new Product_Image(["image_name"=>$this->saveImgBase64(\request("img4"),"productimage/".$product->product_id."/")]));
            }
            return  response()->json("OK",200);

        }else{
            return  response()->json("Error",404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product!=null){
            Storage::deleteDirectory("public/productimage/".$product->product_id);
            $product->images()->delete();
            $product->delete();

            return response()->json("OK",200);
        }else
            return response()->json("NotFound",404);
    }

    public function deavtive($id)
    {
        $product=Product::find(1);
        if($product!=null){
            $product->isSelling==1?$product->isSelling=0:$product->isSelling=1;
            if($product->save()){
                return response()->json("OK",200);
            }
        }else{
            return response()->json("error",404);
        }

    }
    public function getProductForSlider()
    {
        $products=Product::with("images")->get()->random(3)->map(function ($product){
            return ["product_id"=>$product->product_id,"productName"=>$product->name,"imageUrl"=>$product->images[0]->image_name];
        });
        return response()->json($products,200);
    }


}
