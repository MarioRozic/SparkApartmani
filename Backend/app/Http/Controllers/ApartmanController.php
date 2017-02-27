<?php

namespace App\Http\Controllers;

use App\Apartman;
use App\User;
use Illuminate\Http\Request;

class ApartmanController extends Controller
{
    public function getAll(){
        return Apartman::all();
    }

    public function register(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique',
            'password' => 'required|min:4'
        ]);

        $user = $request->all();
        $user['password'] = bcrypt($request['password']);
        $user['remember_token'] = str_random(10);

        try {
            User::create($user);

        } catch (Exception $e) {
            return ['error' => 'User already exists.'];
        }

        return $request->all();
    }
}
