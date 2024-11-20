<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index(){
        $post = DB::table('places')->get();

        return view('place', compact('post'));
    }

    public function getPlaces()
    {
        $places = Place::select('id', 'name')->get();
        return response()->json($places);
    }

}
