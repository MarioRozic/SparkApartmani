<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller


{
    public function reserve(Request $request) {
        $order = new Order([
            'user_id' => $request['user_id'],
            'apartman_id' => $request['apartman_id'],
            'name' => $request['name'],
            'hotel_name' => $request['hotel_name']
        ]);

        $order->save();



        return 'done';

    }

    public function getOrdersByUserId($id) {
        return Order::where('user_id', $id)->get();
    }
}
