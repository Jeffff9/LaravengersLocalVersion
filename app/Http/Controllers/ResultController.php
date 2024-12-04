<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request)
    {
         // Retrieve the question from the session
        $question = session('question');

        // Check if the question exists
        if (!$question) {
            return redirect('/')->with('error', 'No question found.');
        }

        return view('result', compact('question'));
    }
}
