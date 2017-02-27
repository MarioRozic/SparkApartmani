<?php

namespace App\Http\Controllers;

use App\Apartman;
use Illuminate\Http\Request;

class ApartmanController extends Controller
{
    public function getAll(){
        return Apartman::all();
    }
}
