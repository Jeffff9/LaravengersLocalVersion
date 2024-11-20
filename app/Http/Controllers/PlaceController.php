<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    public function index(){
        $post = DB::table('places')->get();

        return view('place', compact('post'));
    }

}
