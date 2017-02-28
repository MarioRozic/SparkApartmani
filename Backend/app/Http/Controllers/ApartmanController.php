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

    public function getById(Request $request, $id) {
        return Apartman::find($id);
    }

}
