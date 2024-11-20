<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り - プラン詳細</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/planDetail.css') }}">
</head>
<body>
    <div class="container">
        @if(isset($planId))
            @if($planId === 'osaka')
                <!-- 大阪プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header">
                        <div class="header-content">
                            <h1 class="display-4">大阪での一日遊びプラン</h1>
                            <div class="plan-description">
                                <p>大阪の魅力を凝縮した、観光・グルメ・エンタメを楽しむ欲張りプランをご紹介します！</p>
                            </div>
                            <div class="plan-stats">
                                <div class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    <div>所要時間</div>
                                    <div>約12時間</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>訪問スポット</div>
                                    <div>6箇所</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-currency-yen"></i>
                                    <div>予算目安</div>
                                    <div>15,000円〜</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="天王寺動物園">
                                <h3>9:00 AM - 天王寺動物園</h3>
                                <p>日本で3番目に古い歴史ある動物園で、約200種1000点の動物たちと出会えます。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> JR「天王寺駅」、地下鉄「動物園前駅」から徒歩5分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '天王寺動物園');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 道頓堀エリア</h3>
                                <p>たこ焼きやお好み焼きなどの大阪名物を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「なんば駅」から徒歩5分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>1:30 PM - 心斎橋筋商店街</h3>
                                <p>ショッピングやカフェタイムを楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「心斎橋駅」直結</p>
                            </div>
                            <div class="activity">
                                <h3>3:00 PM - 通天閣・新世界エリア</h3>
                                <p>昭和のレトロな雰囲気を味わい、串カツなどの軽食をどうぞ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「動物園前駅」から徒歩3分</p>
                            </div>
                        </div>

                        <!-- 夕方 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity">
                                <h3>5:00 PM - 梅田スカイビル</h3>
                                <p>空中庭園展望台で夕焼けと夜景を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「大阪駅」から徒歩10分</p>
                            </div>
                        </div>

                        <!-- 夜 -->
                        <div class="time-block night">
                            <h2><i class="bi bi-moon-stars"></i> 夜</h2>
                            <div class="activity">
                                <h3>7:00 PM - なんばグランド花月</h3>
                                <p>お笑いライブを観賞（事前予約がおすすめ）。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「なんば駅」から徒歩5分</p>
                            </div>
                            <div class="activity">
                                <h3>9:00 PM - なんば周辺</h3>
                                <p>夕食を取り、夜の大阪を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「なんば駅」周辺</p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'kobe')
                <!-- 神戸プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header">
                        <div class="header-content">
                            <h1 class="display-4">神戸一日満喫プラン</h1>
                            <div class="plan-description">
                                <p>港町神戸の魅力を存分に味わう、観光・グルメ・ショッピングプラン！</p>
                            </div>
                            <div class="plan-stats">
                                <div class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    <div>所要時間</div>
                                    <div>約10時間</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>訪問スポット</div>
                                    <div>5箇所</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-currency-yen"></i>
                                    <div>予算目安</div>
                                    <div>12,000円〜</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="神戸どうぶつ王国">
                                <h3>9:30 AM - 神戸どうぶつ王国</h3>
                                <p>動物たちとのふれあいが楽しめる体験型動物園。約100種の動物と出会えます。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> ポートライナー「南公園駅」から徒歩3分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '神戸どうぶつ王国');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity" data-place-name="神戸ハーバーランド">
                                <h3>12:00 PM - 神戸ハーバーランド</h3>
                                <p>umieモザイクで神戸グルメを堪能。海を見ながらのランチタイム。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> JR「神戸駅」から徒歩5分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '神戸ハーバーランド');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="六甲山">
                                <h3>2:00 PM - 六甲山</h3>
                                <p>六甲ガーデンテラスで自然と絶景を楽しむ。天気が良ければ大阪湾も一望できます。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 六甲ケーブル「六甲山上駅」から徒歩10分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '六甲山');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 夕方・夜 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方・夜</h2>
                            <div class="activity" data-place-name="神戸ポートタワー">
                                <h3>5:00 PM - 神戸ポートタワー</h3>
                                <p>夕暮れ時の港町の景色を一望。ライトアップされた神戸の夜景も楽しめます。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 地下鉄海岸線「みなと元町駅」から徒歩5分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '神戸ポートタワー');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'kyoto')
                <!-- 京都プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header">
                        <div class="header-content">
                            <h1 class="display-4">京都一日観光プラン</h1>
                            <div class="plan-description">
                                <p>千年の都・京都の歴史と文化を巡る、贅沢な観光プラン！</p>
                            </div>
                            <div class="plan-stats">
                                <div class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    <div>所要時間</div>
                                    <div>約11時間</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>訪問スポット</div>
                                    <div>5箇所</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-currency-yen"></i>
                                    <div>予算目安</div>
                                    <div>13,000円〜</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="金閣寺">
                                <h3>9:00 AM - 金閣寺</h3>
                                <p>世界遺産の金閣寺で朝の静けさとともに金色に輝く建物を鑑賞。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 市バス「金閣寺道」下車すぐ
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '金閣寺');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 嵐山エリア</h3>
                                <p>嵐山で湯豆腐や京懐石を楽しむ。竹林の小径も散策。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 阪急「嵐山駅」から徒歩10分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="伏見稲荷大社">
                                <h3>2:30 PM - 伏見稲荷大社</h3>
                                <p>千本鳥居の神秘的な雰囲気を体験。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> JR「稲荷駅」から徒歩すぐ
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '伏見稲荷大社');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 夕方・夜 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方・夜</h2>
                            <div class="activity" data-place-name="祇園">
                                <h3>5:00 PM - 祇園</h3>
                                <p>京都の伝統的な町並みを散策。舞妓さんとの出会いも。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 京阪「祇園四条駅」から徒歩5分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '祇園');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'nara')
                <!-- 奈良プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header">
                        <div class="header-content">
                            <h1 class="display-4">奈良一日散策プラン</h1>
                            <div class="plan-description">
                                <p>古都奈良の世界遺産と可愛い鹿たちに出会う、歴史探訪プラン！</p>
                            </div>
                            <div class="plan-stats">
                                <div class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    <div>所要時間</div>
                                    <div>約9時間</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>訪問スポット</div>
                                    <div>4箇所</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-currency-yen"></i>
                                    <div>予算目安</div>
                                    <div>10,000円〜</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="東大寺">
                                <h3>9:00 AM - 東大寺</h3>
                                <p>世界最大の木造建築物で、大仏様に出会う感動的な体験。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 近鉄「奈良駅」から徒歩20分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '東大寺');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 奈良町エリア</h3>
                                <p>古い町並みで奈良の郷土料理を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩15分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="春日大社">
                                <h3>2:00 PM - 春日大社</h3>
                                <p>1200年以上の歴史を持つ神社で、朱塗りの回廊と灯籠の美しさを堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 市内循環バス「春日大社本殿」下車
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '春日大社');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- 夕方 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity" data-place-name="奈良公園">
                                <h3>4:30 PM - 奈良公園</h3>
                                <p>夕暮れ時の鹿たちとの触れ合いを楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i> 近鉄「奈良駅」から徒歩5分
                                    <span class="place-link-container ms-3">
                                        @php
                                            $matchingPlace = $places->firstWhere('name', '奈良公園');
                                        @endphp
                                        @if($matchingPlace)
                                            <a href="{{ route('placeDetail', ['id' => $matchingPlace->id]) }}"
                                               class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        @else
                                            <span class="badge bg-secondary ms-2">
                                                <i class="bi bi-lock"></i> 準備中
                                            </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info mt-4">
                    <h2>指定されたプランが見つかりません</h2>
                    <p>プランIDをご確認ください。</p>
                </div>
            @endif
        @else
            <div class="alert alert-warning mt-4">
                <h2>プランが指定されていません</h2>
                <p>プランを選択してください。</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/planDetail.js') }}"></script>
</body>
</html>
