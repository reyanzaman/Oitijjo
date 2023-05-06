<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function getItemData(Request $request)
    {
        $id = $request->input('id');
    
        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            Log::info('Product not found');
            return abort(404);
        }
    
        $model = $product->model;
        $name = $product->name;
        $description = $product->description;
        $seller_id = $product->seller_id;
        $length = $product->length;
        $width = $product->width;
        $height = $product->height;
        $price = $product->price;
        $stock = $product->stock;
        $image1 = $product->image1;
        $image2 = $product->image2;
        $image3 = $product->image3;
    
        return view('item', compact('id', 'model', 'name', 'description', 'seller_id', 'length', 'width', 'height', 'price', 'stock', 'image1', 'image2', 'image3'));
    }    
}