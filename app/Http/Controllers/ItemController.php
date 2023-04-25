<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function getItemData()
    {
        $id = 2; #Temporarily static
    
        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            return abort(404);
        }
    
        $model = $product->model;
        $name = $product->name;
        $description = $product->description;
        $length = $product->length;
        $width = $product->width;
        $height = $product->height;
        $price = $product->price;
        $stock = $product->stock;
        $image1 = $product->image1;
        $image2 = $product->image2;
        $image3 = $product->image3;
    
        return view('item', compact('model', 'name', 'description', 'length', 'width', 'height', 'price', 'stock', 'image1', 'image2', 'image3'));
    }    
}
