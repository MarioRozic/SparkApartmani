<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function register(Request $request) {

        if(User::where('email',$request['email'])->exists()){
            return response()->json(['error' => 'User already exists!'],404);
        }

        //User::create($request);
        $user = new User([
            'name' => $request['name'],
            'password' => bcrypt($request['email']),
            'email' => $request['email'],
            'remember_token' => str_random(10)
        ]);
        $user->save();

        //$user->createToken(null)->accessToken;

        return response()->json(['success' => 'User successefully added!'],200);





    }
}
