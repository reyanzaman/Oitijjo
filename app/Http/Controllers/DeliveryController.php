<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DeliveryController extends Controller
{
    public function updateStatus(Request $request){
        $data = [];
        parse_str(file_get_contents("php://input"), $data);
        $id = $data['id'] ?? null;
        $status = $data['status'] ?? null;

        error_log("$status");
        error_log("$id");

        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->status = $status;
        $order->save();

        return response()->json(['success' => true]);
    }
}
