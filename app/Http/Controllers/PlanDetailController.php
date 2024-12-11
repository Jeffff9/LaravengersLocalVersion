<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    public function index($id = null)
    {
        $planInfo = [
            'osaka' => [
                'title' => '大阪1日観光プラン',
                'description' => '大阪の魅力を1日で満喫できる観光プラン',
                'background' => 'images/plans/osaka_plans.jpg'
            ],
            'kyoto' => [
                'title' => '京都1日観光プラン',
                'description' => '京都の伝統と文化を体験するプラン',
                'background' => 'images/plans/kyoto_plans.jpg'
            ],
            'kobe' => [
                'title' => '神戸1日観光プラン',
                'description' => '神戸の街並みと食を楽しむプラン',
                'background' => 'images/plans/kobe_plans.jpg'
            ],
            'nara' => [
                'title' => '奈良1日観光プラン',
                'description' => '奈良の歴史と自然を楽しむプラン',
                'background' => 'images/plans/nara_plans.jpg'
            ],
            'wakayama' => [
                'title' => '和歌山1日観光プラン',
                'description' => '和歌山の自然と温泉を楽しむプラン',
                'background' => 'images/plans/wakayama_plans.jpeg'
            ],
            'shiga' => [
                'title' => '滋賀1日観光プラン',
                'description' => '琵琶湖周辺の観光スポットを巡るプラン',
                'background' => 'images/plans/shiga_plans.jpg'
            ],
            'arashiyama' => [
                'title' => '嵐山1日観光プラン',
                'description' => '京都嵐山の風情ある街並みを楽しむプラン',
                'background' => 'images/plans/kyoto_arashiyama_plans.jpg'
            ],
            'usj' => [
                'title' => 'USJ満喫プラン',
                'description' => 'ユニバーサル・スタジオ・ジャパンを存分に楽しむプラン',
                'background' => 'images/plans/usj_plans.jpg'
            ],
            'arima' => [
                'title' => '有馬温泉1日プラン',
                'description' => '日本有数の温泉街で癒しのひとときを',
                'background' => 'images/plans/ArimaOnsen_plans.jpg'
            ],
            'narapark' => [
                'title' => '奈良公園1日プラン',
                'description' => '奈良公園で鹿とふれあい歴史を感じるプラン',
                'background' => 'images/plans/narakoenn_plans.jpg'
            ],
            'amanohashidate' => [
                'title' => '天橋立1日観光プラン',
                'description' => '日本三景の一つ天橋立の絶景を楽しむプラン',
                'background' => 'images/plans/Amanohashidate_plans.jpg'
            ],
            'himeji' => [
                'title' => '姫路1日観光プラン',
                'description' => '世界遺産・姫路城と周辺の観光スポットを巡るプラン',
                'background' => 'images/plans/HimejiCastle_plans.jpg'
            ]
        ];

        // 選択されたプランの情報を取得（存在しない場合はデフォルト値を使用）
        $currentPlan = $planInfo[$id] ?? [
            'title' => '観光プラン',
            'description' => '関西の観光プラン',
            'background' => 'images/plans/default_plan.jpg'
        ];

        return view('planDetail', [
            'planId' => $id,
            'planTitle' => $currentPlan['title'],
            'planDescription' => $currentPlan['description'],
            'backgroundImage' => $currentPlan['background']
        ]);
    }
}
