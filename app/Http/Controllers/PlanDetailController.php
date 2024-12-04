<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanDetailController extends Controller
{
    public function index($planId)
    {
        // 有効なプランIDのリスト
        $validPlans = ['osaka', 'kobe', 'kyoto', 'nara', 'wakayama', 'shiga',
                       'arashiyama', 'usj', 'arima', 'narapark', 'amanohashidate', 'himeji'];

        // プランIDが有効かチェック
        if (!in_array($planId, $validPlans)) {
            abort(404);
        }

        // placesテーブルから全ての場所データを取得
        $places = DB::table('places')->get();

        // ビューに変数を渡す
        return view('planDetail', compact('planId', 'places'));
    }
}
