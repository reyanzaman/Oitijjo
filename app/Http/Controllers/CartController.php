<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCount()
    {
        $cartCount = count(session()->get('cart'));
        return response()->json(['count' => $cartCount]);
    }
}
