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
        // Validate the request
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        // Store the question in the session
        session(['question' => $request->input('question')]);

        // Return a JSON response for the frontend
        return response()->json(['message' => 'Question stored successfully.']);

        // // Validate the request
        // $request->validate([
        //     'question' => 'required|string|max:1000',
        // ]);

        // // Retrieve the question from the request
        // $question = $request->input('question');

        // // Store the question in the session
        // session(['question' => $question]);

        // // Return a success response
        // return view('result', compact('question'));
    }
}

