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


        $today = new \DateTime();
        $today->add(new \DateInterval('P2D'));

        $expireDate = Order::find($id);

        $expireDate1= new \DateTime($expireDate['date']);

        if($expireDate1 > $today) {
            Order::destroy($id);

            return response()->json(['success' => 'Reservation deleted!'],200);

        }

        return response()->json(['error' => 'You must cancel reservation at least 2 days before!'],404);




    }

    public function gerOrderById($id) {
        return Order::find($id);
    }

    public function editOrder(Request $request, $id){
        $reservation = Order::find($id);

        $today = new \DateTime();
        $today->add(new \DateInterval('P2D'));

        $expireDate= new \DateTime(request('date'));

        if($expireDate > $today){
            $reservation->name = $request['name'];
            $reservation->date = $request['date'];
            $reservation->days = $request['days'];

            $reservation->save();

            return response()->json(['success' => 'Reservation successfully edited!'],200);
        }

        return response()->json(['error' => 'Input data incorrect'],404);





    }
}
