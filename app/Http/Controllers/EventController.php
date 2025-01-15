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

        return [
            [
                'id' => 1,
                'title' => '天神祭',
                'description' => '大阪天満宮の氏祭で、日本三大祭の一つ。船渡御や奉納花火など、壮大な祭事が行われます。',
                'image_url' => '/images/events/1.jpg',
                'category' => '祭り',
                'start_date' => '2024-07-24',
                'end_date' => '2024-07-25',
                'location' => '大阪天満宮',
                'price' => 0,
                'access' => '大阪市営地下鉄「南森町駅」から徒歩5分',
                'organizer' => '大阪天満宮',
                'website' => 'https://www.tenjinsan.com/',
                'details' => '日本三大祭の一つとして知られる天神祭は、約1000年の歴史を持つ大阪を代表する夏祭り。船渡御や奉納花火など、様々な伝統行事が行われます。'
            ],
            [
                'id' => 2,
                'title' => '祇園祭',
                'description' => '京都の八坂神社の祭礼で、約1100年の歴史を持つ日本を代表する祭り。山鉾巡行が有名です。',
                'image_url' => '/images/events/2.jpg',
                'category' => '祭り',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-31',
                'location' => '八坂神社',
                'price' => 0,
                'access' => '京都市営地下鉄「祇園四条駅」から徒歩5分',
                'organizer' => '八坂神社',
                'website' => 'https://www.yasaka-jinja.or.jp/',
                'details' => '京都三大祭の一つである祇園祭は、疫病退散を願って始まった歴史ある祭り。豪華絢爛な山鉾巡行は必見です。'
            ],
            [
                'id' => 3,
                'title' => 'なにわ淀川花火大会',
                'description' => '大阪を代表する花火大会。約4000発の花火が夜空を彩ります。',
                'image_url' => '/images/events/3.jpg',
                'category' => '花火大会',
                'start_date' => '2024-08-08',
                'end_date' => '2024-08-08',
                'location' => '淀川河川公園',
                'price' => 0,
                'access' => '阪急電鉄「十三駅」から徒歩10分',
                'organizer' => 'なにわ淀川花火大会実行委員会',
                'website' => 'https://www.yodogawa-hanabi.com/',
                'details' => '大阪の夏の風物詩。音楽と花火のコラボレーションや、仕掛け花火など、様々な演出で観客を魅了します。'
            ],
            [
                'id' => 4,
                'title' => '神戸ルミナリエ',
                'description' => '阪神・淡路大震災の鎮魂と復興への願いを込めて開催される光の祭典。',
                'image_url' => '/images/events/4.jpg',
                'category' => 'イルミネーション',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-12',
                'location' => '神戸市中央区',
                'price' => 0,
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩5分',
                'organizer' => '神戸ルミナリエ組織委員会',
                'website' => 'https://www.kobe-luminarie.jp/',
                'details' => '阪神・淡路大震災の犠牲者の鎮魂の意を込めて始まった光の祭典。イタリアから取り寄せた約40万個のLED電球で作られた光の回廊は圧巻です。'
            ],
            [
                'id' => 5,
                'title' => '奈良燈花会',
                'description' => '奈良の夏の風物詩。約2万個のろうそくが奈良公園を幻想的に照らします。',
                'image_url' => '/images/events/5.jpg',
                'category' => 'イベント',
                'start_date' => '2024-08-05',
                'end_date' => '2024-08-14',
                'location' => '奈良公園',
                'price' => 0,
                'access' => 'JR・近鉄「奈良駅」から徒歩10分',
                'organizer' => '奈良燈花会の会',
                'website' => 'https://www.toukae.jp/',
                'details' => '奈良の夏の風物詩として親しまれている燈花会。約2万個のろうそくの灯りが奈良公園一帯を幻想的に彩ります。古都奈良の夜を美しく照らす光の祭典です。'
            ],
            [
                'id' => 6,
                'title' => '京都五山送り火',
                'description' => 'お盆の夜空に浮かび上がる「大」の字。京都の伝統行事です。',
                'image_url' => '/images/events/6.jpg',
                'category' => '祭り',
                'start_date' => '2024-08-16',
                'end_date' => '2024-08-16',
                'location' => '京都市内の五山',
                'price' => 0,
                'access' => '各山により異なります',
                'organizer' => '京都五山送り火連合会',
                'website' => 'https://www.kyoto-np.co.jp/gozan/',
                'details' => '京都の夏の風物詩である五山送り火。「大文字」「妙法」「船形」「左大文字」「鳥居形」の文字が、夜空に浮かび上がります。'
            ],
            [
                'id' => 7,
                'title' => '住吉祭',
                'description' => '住吉大社の夏祭り。御鳳輦(ごほうれん)渡御が有名です。',
                'image_url' => '/images/events/7.jpg',
                'category' => '祭り',
                'start_date' => '2024-07-30',
                'end_date' => '2024-08-01',
                'location' => '住吉大社',
                'price' => 0,
                'access' => '南海本線「住吉大社駅」から徒歩3分',
                'organizer' => '住吉大社',
                'website' => 'https://www.sumiyoshitaisha.net/',
                'details' => '住吉大社の夏祭は、御鳳輦(ごほうれん)渡御を中心とした荘厳な神事が特徴。古式ゆかしい神事の数々を見ることができます。'
            ],
            [
                'id' => 8,
                'title' => '神戸まつり',
                'description' => '神戸の街を彩るサンバパレードなど、国際色豊かなお祭り。',
                'image_url' => '/images/events/8.jpg',
                'category' => '祭り',
                'start_date' => '2024-05-19',
                'end_date' => '2024-05-19',
                'location' => '神戸市中央区',
                'price' => 0,
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩圏内',
                'organizer' => '神戸まつり委員会',
                'website' => 'https://www.kobe-matsuri.com/',
                'details' => '神戸の街を彩る国際色豊かな祭り。サンバやジャズ、よさこいなど、様々なジャンルのパレードや演奏が楽しめます。'
            ],
            [
                'id' => 9,
                'title' => '葵祭',
                'description' => '京都三大祭の一つ。平安時代さながらの優雅な時代行列。',
                'image_url' => '/images/events/9.jpg',
                'category' => '祭り',
                'start_date' => '2024-05-15',
                'end_date' => '2024-05-15',
                'location' => '下鴨神社、上賀茂神社',
                'price' => 0,
                'access' => '地下鉄「今出川駅」から徒歩15分',
                'organizer' => '下鴨神社、上賀茂神社',
                'website' => 'https://www.shimogamo-jinja.or.jp/aoi/',
                'details' => '京都三大祭の一つである葵祭は、平安時代から続く由緒ある祭り。葵の葉で飾られた優雅な時代行列が京都の街を巡ります。'
            ],
            [
                'id' => 10,
                'title' => 'なら燈火会',
                'description' => '奈良の夜を幻想的に彩るろうそくの光のイベント。',
                'image_url' => '/images/events/10.jpg',
                'category' => 'イベント',
                'start_date' => '2024-08-05',
                'end_date' => '2024-08-14',
                'location' => '奈良公園周辺',
                'price' => 0,
                'access' => 'JR・近鉄「奈良駅」から徒歩10分',
                'organizer' => 'なら燈火会実行委員会',
                'website' => 'https://www.toukae-nara.jp/',
                'details' => '奈良の夜を彩る幻想的な光のイベント。世界遺産の寺社仏閣や奈良公園がろうそくの灯りで照らされ、幽玄な雰囲気を醸し出します。'
            ],
            [
                'id' => 11,
                'title' => 'みなとこうべ海上花火大会',
                'description' => '神戸港を舞台に繰り広げられる華やかな花火大会。',
                'image_url' => '/images/events/11.jpg',
                'category' => '花火大会',
                'start_date' => '2024-08-03',
                'end_date' => '2024-08-03',
                'location' => '神戸港',
                'price' => 0,
                'access' => 'JR・阪神「元町駅」から徒歩10分',
                'organizer' => 'みなとこうべ海上花火大会実行委員会',
                'website' => 'https://www.kobe-hanabi.jp/',
                'details' => '神戸港の夜空を彩る大規模な花火大会。港の夜景と花火のコラボレーションが美しく、音楽とのシンクロ演出も見どころです。'
            ],
            [
                'id' => 12,
                'title' => '京都食博',
                'description' => '京都の伝統的な食文化を体験できる食の祭典。',
                'image_url' => '/images/events/12.jpg',
                'category' => 'グルメ',
                'start_date' => '2024-09-15',
                'end_date' => '2024-09-23',
                'location' => '京都市内各所',
                'price' => 1500,
                'access' => '各会場により異なります',
                'organizer' => '京都食博実行委員会',
                'website' => 'https://kyoto-shokuhaku.jp/',
                'details' => '京都の伝統的な食文化を一堂に集めた食の祭典。老舗料亭の味から現代的な京都グルメまで、様々な京都の食を楽しめます。'
            ],
            [
                'id' => 13,
                'title' => '大阪城3Dマッピング',
                'description' => '大阪城の壁面を使った壮大な3Dプロジェクションマッピング。',
                'image_url' => '/images/events/13.jpg',
                'category' => 'イベント',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-25',
                'location' => '大阪城',
                'price' => 2000,
                'access' => 'JR大阪環状線「大阪城公園駅」から徒歩5分',
                'organizer' => '大阪城3Dマッピング実行委員会',
                'website' => 'https://osaka-castle-illumination.jp/',
                'details' => '大阪城の壁面を巨大スクリーンとして使用する最新技術のプロジェクションマッピング。歴史と現代技術が融合した圧巻のショーを体験できます。'
            ],
            [
                'id' => 14,
                'title' => '奈良大仏全国ライトアップフェスティバル',
                'description' => '東大寺の大仏様を幻想的にライトアップするイベント。',
                'image_url' => '/images/events/14.jpg',
                'category' => 'イベント',
                'start_date' => '2024-10-01',
                'end_date' => '2024-10-31',
                'location' => '東大寺',
                'price' => 1000,
                'access' => '近鉄「奈良駅」から徒歩20分',
                'organizer' => '東大寺',
                'website' => 'https://www.todaiji.or.jp/',
                'details' => '世界最大級の青銅仏である奈良の大仏様を幻想的な光で照らし出すイベント。普段とは異なる荘厳な姿を見ることができます。'
            ],
            [
                'id' => 15,
                'title' => '神戸ジャズストリート',
                'description' => '神戸の街角で繰り広げられる音楽の祭典。',
                'image_url' => '/images/events/15.jpg',
                'category' => '音楽',
                'start_date' => '2024-10-12',
                'end_date' => '2024-10-13',
                'location' => '神戸市中央区',
                'price' => 3000,
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩圏内',
                'organizer' => '神戸ジャズストリート実行委員会',
                'website' => 'https://www.kobe-jazz.jp/',
                'details' => '神戸の街がジャズ一色になる音楽の祭典。街角の至るところでプロミュージシャンによる演奏が行われ、ジャズの街神戸を満喫できます。'
            ],
            [
                'id' => 16,
                'title' => '京都・嵐山花灯路',
                'description' => '嵐山一帯をLEDの光で彩るライトアップイベント。竹林の道や渡月橋が幻想的な雰囲気に。',
                'image_url' => '/images/events/16.jpg',
                'category' => 'イルミネーション',
                'start_date' => '2024-12-08',
                'end_date' => '2024-12-17',
                'location' => '京都市嵐山一帯',
                'price' => 0,
                'access' => '阪急電鉄「嵐山駅」から徒歩5分',
                'organizer' => '京都・花灯路推進協議会',
                'website' => 'https://www.hanatouro.jp/arashiyama/',
                'details' => '京都・嵐山エリアの観光名所を幻想的にライトアップする冬の風物詩。竹林の小径や渡月橋など、嵐山の景勝地が美しい光に包まれます。'
            ],
            [
                'id' => 17,
                'title' => '大阪オクトーバーフェスト',
                'description' => 'ドイツビールと料理を楽しむ野外フェスティバル。本場の雰囲気を大阪で体験できます。',
                'image_url' => '/images/events/17.jpg',
                'category' => 'グルメ',
                'start_date' => '2024-09-20',
                'end_date' => '2024-10-02',
                'location' => '大阪城公園',
                'price' => 2500,
                'access' => 'JR大阪環状線「大阪城公園駅」から徒歩3分',
                'organizer' => '大阪オクトーバーフェスト実行委員会',
                'website' => 'https://www.oktober-fest.jp/',
                'details' => '本場ドイツのビールとソーセージを楽しめる野外フェスティバル。ドイツから招いた楽団による生演奏も楽しめます。'
            ],
            [
                'id' => 18,
                'title' => '神戸イルミナージュ',
                'description' => '約100万球のLEDで彩られる光の王国。音楽とシンクロした幻想的な光の世界を体験できます。',
                'image_url' => '/images/events/18.jpg',
                'category' => 'イルミネーション',
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-25',
                'location' => '神戸市立須磨離宮公園',
                'price' => 1800,
                'access' => 'JR「須磨駅」から徒歩10分',
                'organizer' => '神戸イルミナージュ実行委員会',
                'website' => 'https://www.kobe-illuminage.jp/',
                'details' => '100万球のLEDで彩られる光の王国。音楽に合わせて変化する光のショーや、様々なフォトスポットが楽しめます。'
            ],
            [
                'id' => 19,
                'title' => '奈良若草山焼き',
                'description' => '若草山の山焼き。古都奈良の冬の風物詩として知られる伝統行事。',
                'image_url' => '/images/events/19.jpg',
                'category' => '祭り',
                'start_date' => '2024-01-27',
                'end_date' => '2024-01-27',
                'location' => '奈良若草山',
                'price' => 0,
                'access' => '近鉄奈良駅から市内循環バス「若草山」下車',
                'organizer' => '奈良市観光協会',
                'website' => 'https://narashikanko.or.jp/',
                'details' => '奈良の冬の風物詩として知られる伝統行事。夜空に浮かび上がる炎の光景は圧巻です。'
            ],
            [
                'id' => 20,
                'title' => '大阪光のルネサンス',
                'description' => '大阪市役所周辺を彩る光のアートフェスティバル。壮大な3Dマッピングも。',
                'image_url' => '/images/events/20.jpg',
                'category' => 'イルミネーション',
                'start_date' => '2024-12-14',
                'end_date' => '2024-12-25',
                'location' => '大阪市中央公会堂周辺',
                'price' => 0,
                'access' => '地下鉄「淀屋橋駅」から徒歩3分',
                'organizer' => '大阪市',
                'website' => 'https://www.hikari-renaissance.jp/',
                'details' => '大阪市中央公会堂を中心に、光と音楽で街を彩るイルミネーションイベント。3Dプロジェクションマッピングや、光のオブジェなど、様々な光の演出が楽しめます。'
            ],
            [
                'id' => 21,
                'title' => '京都・梅小路マルシェ',
                'description' => '京都の食材や雑貨が集まる定期市。地元グルメも楽しめます。',
                'image_url' => '/images/events/21.jpeg',
                'category' => 'グルメ',
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-03',
                'location' => '梅小路公園',
                'price' => 0,
                'access' => 'JR京都駅から徒歩15分、市バス「梅小路公園前」下車すぐ',
                'organizer' => '京都市・梅小路公園マルシェ実行委員会',
                'website' => 'https://www.kyoto-marche.jp/',
                'details' => '京都の旬の食材や地元作家による手作り雑貨が集まる市場。京都の食文化や工芸品を一度に楽しめます。'
            ]
        ];
    }
}
