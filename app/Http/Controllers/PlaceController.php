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

        foreach ($places as $place) {
            $place->im1 = 'data:image/jpeg;base64,' . base64_encode($place->im1);
        }

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

    // 詳細ページ用のメソッドを追加
    public function detail($id)
    {
        // IDに基づいて場所の詳細情報を取得
        $place = DB::table('places')->where('placeNumber', $id)->first();

        if ($place){
            $place->im1 = 'data:image/jpeg;base64,' .base64_encode( $place->im1);
            $place->im2 = 'data:image/jpeg;base64,' . base64_encode( $place->im2);
            $place->im3 = 'data:image/jpeg;base64,' . base64_encode( $place->im3);
            $place->im4 = 'data:image/jpeg;base64,' . base64_encode( $place->im4);
        } else {
            // Handle the case where no record is found
            return redirect()->back()->with('error', '場所が見つかりません。');
        }


        return view('placeDetail', compact('place'));
    }
}
