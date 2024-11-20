<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        return view('event');
    }

    public function getEvents(Request $request)
    {
        try {
            $events = $this->getEventData();

            // キーワード検索
            if ($request->keyword) {
                $events = array_filter($events, function($event) use ($request) {
                    return str_contains(mb_strtolower($event['title']), mb_strtolower($request->keyword)) ||
                        str_contains(mb_strtolower($event['description']), mb_strtolower($request->keyword));
                });
            }

            // エリアでフィルタリング
            if ($request->area) {
                $events = array_filter($events, function($event) use ($request) {
                    $area = mb_strtolower($request->area);
                    $location = mb_strtolower($event['location']);

                    // エリアごとのキーワードマッピング
                    $areaKeywords = [
                        'osaka-city' => ['大阪市'],
                        'umeda' => ['梅田', '大阪駅'],
                        'namba' => ['難波', 'なんば'],
                        'tennoji' => ['天王寺'],
                        'shin-osaka' => ['新大阪'],
                        'sakai' => ['堺'],
                        'kyoto-city' => ['京都市'],
                        'arashiyama' => ['嵐山'],
                        'gion' => ['祇園'],
                        'fushimi' => ['伏見'],
                        'uji' => ['宇治'],
                        'sannomiya' => ['三宮'],
                        'harborland' => ['ハーバーランド'],
                        'kitano' => ['北野'],
                        'suma' => ['須磨'],
                        'rokko' => ['六甲'],
                        'nara-city' => ['奈良市'],
                        'todaiji' => ['東大寺'],
                        'horyuji' => ['法隆寺'],
                        'yoshino' => ['吉野']
                    ];

                    if (isset($areaKeywords[$area])) {
                        foreach ($areaKeywords[$area] as $keyword) {
                            if (str_contains($location, $keyword)) {
                                return true;
                            }
                        }
                        return false;
                    }
                    return true;
                });
            }

            // カテゴリーでフィルタリング
            if ($request->category) {
                $events = array_filter($events, function($event) use ($request) {
                    return $event['category'] === $request->category;
                });
            }

            // 結果が空の場合のチェック
            if (empty($events)) {
                return response()->json([]);
            }

            return response()->json(array_values($events));
        } catch (\Exception $e) {
            return response()->json(['error' => 'イベント情報の取得に失敗しました'], 500);
        }
    }

    public function detail($id)
    {
        $events = $this->getEventData();
        $event = collect($events)->firstWhere('id', (int)$id);

        if (!$event) {
            abort(404);
        }

        // イベントのステータスを設定
        $now = Carbon::now();
        $startDate = Carbon::parse($event['start_date']);
        $endDate = isset($event['end_date']) ? Carbon::parse($event['end_date']) : $startDate;

        if ($now->lt($startDate)) {
            $event['status'] = '開催予定';
        } elseif ($now->gt($endDate)) {
            $event['status'] = '終了';
        } else {
            $event['status'] = '開催中';
        }

        // アクセス情報がない場合のデフォルト値を設定
        $event['access'] = $event['access'] ?? '最寄り駅からのアクセス情報';
        $event['organizer'] = $event['organizer'] ?? 'イベント主催者';
        $event['website'] = $event['website'] ?? '#';
        $event['details'] = $event['details'] ?? $event['description'];
        $event['price'] = $event['price'] ?? 0;

        return view('event-detail', [
            'event' => $event,
            'googleMapsApiKey' => env('GOOGLE_MAPS_API_KEY')
        ]);
    }

    private function getEventData()
    {
        $now = Carbon::now();
        $defaultImage = '/images/events/default_event.jpg';

        return [
            [
                'id' => 1,
                'title' => '天神祭',
                'description' => '日本三大祭の一つ。大阪天満宮の祭礼で、船渡御や奉納花火など様々な行事が行われます。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(30)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(31)->format('Y-m-d'),
                'category' => '祭り',
                'location' => '大阪天満宮（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 2,
                'title' => '住吉祭',
                'description' => '住吉大社の夏祭。御鳳輦(ごほうれん)渡御をはじめ、様々な神事が執り行われます。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(45)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(46)->format('Y-m-d'),
                'category' => '祭り',
                'location' => '住吉大社（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 7,
                'title' => 'なにわ淀川花火大会',
                'description' => '大阪を代表する花火大会。約10,000発の花火が夜空を彩ります。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(40)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(40)->format('Y-m-d'),
                'category' => '花火大会',
                'location' => '淀川河川公園（大阪）',
                'status' => '開催予定',
                'price' => 0,
                'access' => '阪急電鉄「十三駅」から徒歩10分',
                'organizer' => 'なにわ淀川花火大会実行委員会',
                'website' => 'https://www.yodogawa-hanabi.com/',
                'details' => '大阪の夏の風物詩として親しまれている花火大会。約10,000発の花火が打ち上げられ、音楽と花火のコラボレーションショーなども実施されます。'
            ],
            [
                'id' => 8,
                'title' => '関西ラーメンフェスティバル',
                'description' => '関西各地の人気ラーメン店が集結する大規模グルメイベント。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(20)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(22)->format('Y-m-d'),
                'category' => 'グルメ',
                'location' => '大阪城公園（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 9,
                'title' => '京都音楽祭',
                'description' => '伝統音楽から現代音楽まで、様々なジャンルの音楽が楽しめる音楽祭。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(50)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(52)->format('Y-m-d'),
                'category' => '音楽',
                'location' => '岡崎公園（京都）',
                'status' => '開催予定'
            ],
            [
                'id' => 10,
                'title' => '五山送り火',
                'description' => '京都の夏を代表する伝統行事。山に浮かび上がる「大」の字が有名です。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(55)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(55)->format('Y-m-d'),
                'category' => '伝統行事',
                'location' => '京都市内の五山（京都）',
                'status' => '開催予定'
            ],
            [
                'id' => 16,
                'title' => '京都・嵐山花灯路',
                'description' => '嵐山一帯をLEDの光で彩るライトアップイベント。竹林の道や渡月橋が幻想的な雰囲気に。',
                'image_url' => $defaultImage,
                'start_date' => '2024-12-08',
                'end_date' => '2024-12-17',
                'category' => 'イルミネーション',
                'location' => '京都市嵐山一帯',
                'status' => '開催予定',
                'price' => 0,
                'access' => '阪急電鉄「嵐山駅」から徒歩5分、JR嵯峨野線「嵯峨嵐山駅」から徒歩15分',
                'organizer' => '京都・花灯路推進協議会',
                'website' => 'https://www.hanatouro.jp/arashiyama/',
                'details' => '京都・嵐山エリアの観光名所を幻想的にライトアップする冬の風物詩。竹林の小径や渡月橋など、嵐山の景勝地が美しい光に包まれます。'
            ],
            [
                'id' => 17,
                'title' => '大阪オクトーバーフェスティバル',
                'description' => 'ドイツビールと料理を楽しむ野外フェスティバル。本場の雰囲気を大阪で体験できます。',
                'image_url' => $defaultImage,
                'start_date' => '2024-09-20',
                'end_date' => '2024-10-02',
                'category' => 'グルメ',
                'location' => '大阪城公園',
                'status' => '開催予定',
                'price' => 2500,
                'access' => 'JR大阪環状線「大阪城公園駅」から徒歩3分',
                'organizer' => '大阪オクトーバーフェスト実行委員会',
                'website' => 'https://www.oktober-fest.jp/',
                'details' => '本場ドイツのビールとソーセージを楽しめる野外フェスティバル。ドイツから招いた楽団による生演奏も楽しめます。'
            ],
            [
                'id' => 21,
                'title' => '京都・梅小路マルシェ',
                'description' => '京都の食材や雑貨が集まる定期市。地元グルメも楽しめます。',
                'image_url' => $defaultImage,
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-03',
                'category' => 'グルメ',
                'location' => '梅小路公園',
                'status' => '開催予定',
                'price' => 0,
                'access' => 'JR京都駅から徒歩15分、市バス「梅小路公園前」下車すぐ',
                'organizer' => '京都市・梅小路公園マルシェ実行委員会',
                'website' => 'https://www.kyoto-marche.jp/',
                'details' => '京都の旬の食材や地元作家による手作り雑貨が集まる市場。京都の食文化や工芸品を一度に楽しめます。'
            ],
            [
                'id' => 4,
                'title' => '神戸ルミナリエ',
                'description' => '阪神・淡路大震災の鎮魂と復興への願いを込めて開催される光の祭典。',
                'image_url' => $defaultImage,
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-12',
                'category' => 'イルミネーション',
                'location' => '神戸市中央区',
                'status' => '開催予定',
                'price' => 0,
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩5分',
                'organizer' => '神戸ルミナリエ組織委員会',
                'website' => 'https://www.kobe-luminarie.jp/',
                'details' => '阪神・淡路大震災の犠牲者の鎮魂の意を込めて始まった光の祭典。イタリアから取り寄せた約40万個のLED電球で作られた光の回廊は圧巻です。'
            ],
            [
                'id' => 20,
                'title' => '大阪光のルネサンス',
                'description' => '大阪市役所周辺を彩る光のアートフェスティバル。壮大な3Dマッピングも。',
                'image_url' => $defaultImage,
                'start_date' => '2024-12-14',
                'end_date' => '2024-12-25',
                'category' => 'イルミネーション',
                'location' => '大阪市中央公会堂周辺',
                'status' => '開催予定',
                'price' => 0,
                'access' => '地下鉄「淀屋橋駅」から徒歩3分',
                'organizer' => '大阪市',
                'website' => 'https://www.hikari-renaissance.jp/',
                'details' => '大阪市中央公会堂を中心に、光と音楽で街を彩るイルミネーションイベント。3Dプロジェクションマッピングや、光のオブジェなど、様々な光の演出が楽しめます。'
            ]
        ];
    }
}
