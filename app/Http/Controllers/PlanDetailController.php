<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanDetailController extends Controller
{
    public function index(Request $request)
    {
        $planId = $request->route('planId', 'osaka');

        // placesテーブルから全ての場所データを取得
        $places = DB::table('places')->get();

        // ビューに両方の変数を渡す
        return view('planDetail', compact('planId', 'places'));
    }
}
