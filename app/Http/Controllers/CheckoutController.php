<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function orderCart(Request $request){
        $method = $request->input('selected_button');
        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $alt_number = $request->input('alt_number');
        $totalPrice = $request->input('totalPrice');
        $quantity = $request->input('quantity');
        $quantityArray = json_decode($quantity, true);
        $quantityDict = [];

        foreach ($quantityArray as $item) {
            $id = $item[0];
            $quantity = $item[1];
            $quantityDict[$id] = $quantity;
        }

        error_log("Method: $method, Name: $name, Address: $address, City: $city, Phone: $phone, Alt Number: $alt_number, Total Price: $totalPrice");

        $user = Auth::user();
        $userId = $user ? $user->id : 1;
        error_log("User ID: $userId");

         // Store order details in the database
        $order = new Order();
        $order->user_id = $userId;
        $order->total_amount = $totalPrice;
        $order->status = 'pending';
        $order->method = $method;
        $order->number = $phone;
        if(isset($alt_number)){
            $order->alt_number = $alt_number;
        }  
        $order->save();
        error_log("Order set to database");

        // Store order items in the database
        $processedIds = array();
        $cartData = json_decode($request->input('cartData'), true);
        foreach ($cartData as $cartItem) {
            $productId = $cartItem['id'];
            if (in_array($productId, $processedIds)) {
                continue;
            }
            $processedIds[] = $productId;
            
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem['id'];
            $orderItem->quantity = $quantityDict[$cartItem['id']];
            $orderItem->price = $cartItem['price'];
            $orderItem->save();
        }

        error_log("Order items has been updated in the database");
        return $order->id;
    }

    public function orderStatus(Request $request){
        $id = $request->input('id');
        $order = Order::find($id);
        if (!$order) {
            error_log("Order not found");
            return response()->json(['error' => 'Order not found'], 404);
        }
        $status = $order->status;
        $updated_at = $order->updated_at;
        error_log("Order found");
        return response()->json(['status' => $status, 'updated_at' => $updated_at]);
    }    
}
