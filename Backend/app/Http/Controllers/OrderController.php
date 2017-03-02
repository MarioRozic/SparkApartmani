<?php

namespace App\Http\Controllers;

use App\Order;
use Faker\Provider\cs_CZ\DateTime;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class OrderController extends Controller


{
    public function reserve(Request $request) {


        if(Order::where('user_id', $request['user_id'])->exists() &&
            Order::where('apartman_id', $request['apartman_id'])->exists() ){
            return response()->json(['error' => 'Reservation exists'], 404);
        }



        $order = new Order([
            'user_id' => $request['user_id'],
            'apartman_id' => $request['apartman_id'],
            'name' => $request['name'],
            'hotel_name' => $request['hotel_name'],
            'date' => $request['date'],
            'days' => $request['days']
        ]);

        $order->save();



        return 'done';

    }

    public function getOrdersByUserId($id) {
        return Order::where('user_id', $id)->get();
    }

    public function cancelReservation($id) {
        /*
        $date = new DateTime('today');
        $date->add(new DateInterval('P2D'));


         if(Order::where('date', '>=', $date)){
             return 'USO u IF';
         }
        */

        Order::destroy($id);
        return 'Nije uso';

    }
}
