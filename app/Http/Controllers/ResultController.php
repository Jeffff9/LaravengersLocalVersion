<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $question = $request->session()->get('question', 'Default question if none found');

        return view('Result', ['question' => $question]);
    }
}

