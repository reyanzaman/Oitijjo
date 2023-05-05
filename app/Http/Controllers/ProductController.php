<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getDetails()
    {
        $products = DB::table('product')->get();
        if (!$products) {
            Log::info('No products found');
            return abort(404);
        }
    
        $productDetails = [];
        foreach ($products as $product) {
            $productDetails[] = [
                'id' => $product->id,
                'model' => $product->model,
                'name' => $product->name,
                'description' => $product->description,
                'seller_id' => $product->seller_id,
                'length' => $product->length,
                'width' => $product->width,
                'height' => $product->height,
                'price' => $product->price,
                'stock' => $product->stock,
                'image1' => $product->image1,
                'image2' => $product->image2,
                'image3' => $product->image3
            ];
        }
    
        return response()->json($productDetails);
    }
    
    public function getSeller($id)
    {
        $seller = DB::table('seller')->where('id', $id)->first();
        if (!$seller) {
            Log::info('Seller not found');
            return abort(404);
        }
    
        $sellerDetails = [
            'id' => $seller->id,
            'name' => $seller->name,
            'address' => $seller->address,
            'contact' => $seller->contact
        ];
    
        return response()->json($sellerDetails);
    }    
}
