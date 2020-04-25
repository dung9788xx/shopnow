<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getThumbImage($id)
    {
        $product=Product::findOrFail($id);
        return Storage::download('public/productimage/'.$id."/".$product->images[0]->image_name);
    }
}
