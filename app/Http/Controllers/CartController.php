<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request){


        return view('cart');
    }
    public function post(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        session(['question' => $request->input('question')]);

        return response()->json(['message' => 'Question stored successfully.']);
    }
}

