<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index(Request $request){


        return view('cart');
    }
    public function post(Request $request)
    {
        \Log::info('Request received', $request->all());

        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        session(['question' => $request->input('question')]);

        \Log::info('Question stored in session');

        return response()->json(['message' => 'Question stored successfully.']);
    }
}

