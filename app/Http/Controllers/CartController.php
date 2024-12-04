<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function post(Request $request)
    {
        // Validate the request
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        // Retrieve the question from the request
        $question = $request->input('question');

        // Store the question in the session
        session(['question' => $question]);

        // Return a success response
        return view('result', compact('question'));
    }
}

