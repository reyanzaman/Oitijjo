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
        $diameter = $product->diameter;
        $height = $product->height;
        $width = $product->width;
        $price = $product->price;
        $image1 = $product->image1;
        $image2 = $product->image2;
        $image3 = $product->image3;
    
        return view('item', compact('model', 'name', 'description', 'diameter', 'height', 'width', 'price', 'image1', 'image2', 'image3'));
    }    
}
