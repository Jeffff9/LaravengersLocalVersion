<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    public function index(Request $request){
        $query = DB::table('places');

        // キーワード検索
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('placeName', 'like', "%{$keyword}%")
                  ->orWhere('shortDetail', 'like', "%{$keyword}%");
            });
        }

        // 特徴による絞り込み
        if ($request->has('characteristics')) {
            $query->whereIn('characteristics', $request->characteristics);
        }

        // エリアによる絞り込み
        if ($request->has('area')) {
            $query->whereIn('address', $request->area);
        }

        // 6件ごとにページネーション
        $places = $query->paginate(6);

        // 場所の種類（characteristics）とエリア（address）の一覧を取得
        $characteristics = DB::table('places')
            ->select('characteristics')
            ->whereNotNull('characteristics')
            ->distinct()
            ->get();

        $areas = DB::table('places')
            ->select('address')
            ->whereNotNull('address')
            ->distinct()
            ->get();

        return view('place', compact('places', 'characteristics', 'areas'));
    }
}
