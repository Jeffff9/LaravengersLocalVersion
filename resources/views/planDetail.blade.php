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
        @if (isset($planId))
            @if ($planId === 'osaka')
                <!-- 大阪プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR天王寺駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        JR「天王寺駅」、地下鉄「動物園前駅」から徒歩5分
                                    </a>
                                    {{-- <span class="place-link-container ms-3">
                                        <a href="{{ route('Place.show', ['Place' => 1]) }}" class="btn btn-sm btn-outline-primary ms-2">
                                            <i class="bi bi-info-circle"></i> 詳細を見る
                                        </a>
                                    </span> --}}
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 道頓堀エリア</h3>
                                <p>たこ焼きやお好み焼きなどの大阪名物を堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄なんば駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄「なんば駅」から徒歩5分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>1:30 PM - 心斎橋筋商店街</h3>
                                <p>ショッピングやカフェタイムを楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄心斎橋駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄「心斎橋駅」直結
                                    </a>
                                </p>
                            </div>
                            <div class="activity">
                                <h3>3:00 PM - 通天閣・新世界エリア</h3>
                                <p>昭和のレトロな雰囲気を味わい、串カツなどの軽食をどうぞ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄動物園前駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄「動物園前駅」から徒歩3分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 夕方 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity">
                                <h3>5:00 PM - 梅スカイビル</h3>
                                <p>空中庭園展望台で夕焼けと夜景を楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR大阪駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        JR「大阪駅」から徒歩10分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 夜 -->
                        <div class="time-block night">
                            <h2><i class="bi bi-moon-stars"></i> 夜</h2>
                            <div class="activity">
                                <h3>7:00 PM - なんばグランド花月</h3>
                                <p>お笑いライブを観賞（事前予約がおすすめ）。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄なんば駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄「なんば駅」から徒歩5分
                                    </a>
                                </p>
                            </div>
                            <div class="activity">
                                <h3>9:00 PM - なんば周辺</h3>
                                <p>夕食を取り、夜の大阪を堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄なんば駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄「なんば駅」周辺
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'kobe')
                <!-- 神戸プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('ポートライナー南公園駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        ポートライナー「南公園駅」から徒歩3分
                                    </a>
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR神戸駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        JR「神戸駅」から徒歩5分
                                    </a>
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('六甲ケーブル六甲山上駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        六甲ケーブル「六甲山上駅」から徒歩10分
                                    </a>
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('地下鉄みなと元町駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        地下鉄海岸線「みなと元町駅」から徒歩5分
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'kyoto')
                <!-- 京都プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('比叡山延暦寺') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        叡山電車「延暦寺駅」からケーブルカー
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 嵐山エリア</h3>
                                <p>嵐山で湯豆腐や京懐石を楽しむ。竹林の小径も策。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('阪急嵐山駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        阪急「嵐山駅」から徒歩10分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="伏見稲荷大社">
                                <h3>2:30 PM - 伏見稲荷大社</h3>
                                <p>千本鳥居の神秘的な雰囲気を体験。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR稲荷駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        叡山電車「稲荷駅」から徒歩すぐ
                                    </a>
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('京阪祇園四条駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        京阪「祇園四条駅」から徒歩5分
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'nara')
                <!-- 奈良プラン -->
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                        <div class="header-content">
                            <h1 class="display-4">奈良一日散策プラン</h1>
                            <div class="plan-description">
                                <p>古都奈良の世界遺産と可愛い鹿たちに出会う、歴史探プラン！</p>
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
                                    <div>10,000円</div>
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
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR奈良駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        鉄「奈良駅」から徒歩20分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 奈良町エリア</h3>
                                <p>古い町並みで奈良の郷土料理を堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR奈良駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        鉄「奈良駅」から徒歩15分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="春日大社">
                                <h3>2:00 PM - 春日大社</h3>
                                <p>1200年以上の史を持つ神社で、朱塗りの回廊と灯籠の美しさを堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('春日大社本殿') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        市内循環バス「春日大社本殿」下車
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- 夕方 -->
                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity" data-place-name="奈良公園">
                                <h3>4:30 PM - 奈良公園</h3>
                                <p>夕暮れ時の鹿たちの触れ合いを楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR奈良駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        近鉄「奈良駅」から徒歩5分
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'wakayama')
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                        <div class="header-content">
                            <h1 class="display-4">和歌山一日観光プラン</h1>
                            <div class="plan-description">
                                <p>歴史と自然が調和する和歌山の魅力を存分に味わうプラン！</p>
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
                                    <div>4箇所</div>
                                </div>
                                <div class="stat-item">
                                    <i class="bi bi-currency-yen"></i>
                                    <div>予算目安</div>
                                    <div>11,000円〜</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="和歌山城">
                                <h3>9:00 AM - 和歌山城</h3>
                                <p>紀州徳川家の居城として栄えた和歌山のシンボル。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR和歌山駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        鉄「和歌山駅」からバスで15分
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 和歌山ラーメン</h3>
                                <p>地元で人気の和歌山ラーメンを堪能。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('和歌山市内各所') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        和歌山市内各所
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="和歌山マリーナシティ">
                                <h3>2:00 PM - 和歌山マリーナシティ</h3>
                                <p>黒潮市場でショッピングと海���を楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('和歌山マリーナシティ') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        和歌山バス「マリーナシティ」下車
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="time-block evening">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity" data-place-name="加太">
                                <h3>4:30 PM - 加太の夕陽</h3>
                                <p>友ヶ島を望む絶景スポットで夕日を楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR加太駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        鉄「加太駅」から徒歩15分
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($planId === 'shiga')
                <div class="plan-section mb-5">
                    <div class="plan-header"
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                        <div class="header-content">
                            <h1 class="display-4">滋賀・琵琶湖一日プラン</h1>
                            <div class="plan-description">
                                <p>日本最大の湖・琵琶湖と歴史ある寺社を巡る充実プラン！</p>
                            </div>
                            <div class="plan-stats">
                                <!-- 統計情報 -->
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <!-- 時間ごとの活動内容 -->
                        <div class="time-block morning">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity" data-place-name="比叡山延暦寺">
                                <h3>9:00 AM - 比叡山延暦寺</h3>
                                <p>世界遺産の古刹で、1200年の歴史を感じる。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('比叡山延暦寺') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        叡山電車「延暦寺駅」からケーブルカー
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="time-block lunch">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 琵琶湖クルーズランチ</h3>
                                <p>琵琶湖を眺めながら近江牛や地元の食材を楽しむ。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('大津港') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        大津港から乗船
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="time-block afternoon">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity" data-place-name="彦根城">
                                <h3>2:00 PM - 彦根城</h3>
                                <p>国宝の天守閣と美しい庭園を見学。</p>
                                <p class="access">
                                    <i class="bi bi-train-front"></i>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR彦根駅') }}"
                                        target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                        JR「彦根駅」からバスで15分
                                    </a>
                                    <span class="place-link-container ms-3">
                                        <a href="{{ route('Place.show', ['Place' => 1]) }}"
                                            class="btn btn-sm btn-outline-primary ms-2">
                                            <i class="bi bi-info-circle"></i> 詳細を見る
                                        </a>
                                    </span>
                                </p>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity" data-place-name="近江八幡">
                                    <h3>4:30 PM - 近江八幡の街並み</h3>
                                    <p>八幡堀周辺の風情ある街並みを散策。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR近江八幡駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            JR「近江八幡駅」から徒歩15分
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'arashiyama')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">京都嵐山一日プラン</h1>
                                <div class="plan-description">
                                    <p>風情ある竹林と渡月橋、寺院巡りで京都の魅力を満喫！</p>
                                </div>
                                <div class="plan-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <div>所要時間</div>
                                        <div>約8時間</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>訪問スポット</div>
                                        <div>5箇所</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-currency-yen"></i>
                                        <div>予算目安</div>
                                        <div>9,000円〜</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity" data-place-name="竹林の小径">
                                    <h3>9:00 AM - 竹林の小径</h3>
                                    <p>朝の静けさの中で幻想的な竹林を散策。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('阪急嵐山駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            阪急「嵐山駅」から徒歩10分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:00 PM - 湯豆腐料理</h3>
                                    <p>嵐山名物の湯豆腐を堪能。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('渡月橋周辺の料理店') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            渡月橋周辺の料理店
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity" data-place-name="天龍寺">
                                    <h3>2:00 PM - 天龍寺</h3>
                                    <p>世界遺産の禅寺で美しい庭園を鑑賞。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('阪急嵐山駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            阪急「嵐山駅」から徒歩5分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity" data-place-name="渡月橋">
                                    <h3>4:30 PM - 渡月橋</h3>
                                    <p>夕暮れ時の渡月橋と保津川の景色を楽しむ。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('阪急嵐山駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            阪急「嵐山駅」から徒歩8分
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'usj')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">USJ満喫プラン</h1>
                                <div class="plan-description">
                                    <p>ユニバーサル・スタジオ・ジャパンで日楽しもう！</p>
                                </div>
                                <div class="plan-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <div>所要時間</div>
                                        <div>約12時間</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>エリア数</div>
                                        <div>8エリア</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-currency-yen"></i>
                                        <div>予算目安</div>
                                        <div>20,000円〜</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity">
                                    <h3>8:30 AM - パーク入場</h3>
                                    <p>開園直後に人気アトラクションへ。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JRユニバーサルシティ駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            JR「ユニバーサルシティ駅」から徒歩5分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:00 PM - パーク内レストラン</h3>
                                    <p>テーマ性のある楽しいレストランで食事。</p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity">
                                    <h3>2:00 PM - パレード鑑賞</h3>
                                    <p>華やかなパレードを楽しむ。</p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方・夜</h2>
                                <div class="activity">
                                    <h3>6:00 PM - ナイトショー</h3>
                                    <p>夜の幻想的なショーでフィナーレ。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'arima')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">有馬温泉癒しプラン</h1>
                                <div class="plan-description">
                                    <p>日本三古湯の一つ、有馬温泉でゆったりと過ごす一日。</p>
                                </div>
                                <div class="plan-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <div>所要時間</div>
                                        <div>約8時間</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>訪問スポット</div>
                                        <div>4箇所</div>
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
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity" data-place-name="金の湯">
                                    <h3>10:00 AM - 金の湯</h3>
                                    <p>有馬温泉を代表する外湯で温泉を満喫。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('神戸電鉄有馬温泉駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            神戸電鉄「有馬温泉駅」から徒歩5分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:30 PM - 温泉街の食事処</h3>
                                    <p>地元の季節料理を楽しむ。</p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity">
                                    <h3>2:00 PM - 有馬温泉街散策</h3>
                                    <p>温泉まんじゅうや地場産品のショッピング。</p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity" data-place-name="銀の湯">
                                    <h3>4:00 PM - 銀の湯</h3>
                                    <p>もう一つの名湯で締めくくり。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('温泉街の中心部') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            温泉街の中心部
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'narapark')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">奈良公園癒しプラン</h1>
                                <div class="plan-description">
                                    <p>鹿との触れ合いと世界遺産の寺社を巡る、のんびり散策プラン。</p>
                                </div>
                                <div class="plan-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <div>所要時間</div>
                                        <div>約7時間</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>訪問スポット</div>
                                        <div>4箇所</div>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-currency-yen"></i>
                                        <div>予算目安</div>
                                        <div>8,000円〜</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity" data-place-name="奈良公園">
                                    <h3>9:00 AM - 鹿との触れ合い</h3>
                                    <p>朝の静かな公園で鹿せんべいを与えながら鹿と触れ合う。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('近鉄奈良駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            近鉄「奈良駅」から徒歩5分
                                        </a>
                                        {{-- <span class="place-link-container ms-3">
                                            <a href="{{ route('Place.show', ['Place' => 1]) }}"
                                                class="btn btn-sm btn-outline-primary ms-2">
                                                <i class="bi bi-info-circle"></i> 詳細を見る
                                            </a>
                                        </span> --}}
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:00 PM - 奈良茶飯</h3>
                                    <p>奈良の郷土料理「茶飯」を味わう。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR奈良駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            近鉄「奈良駅」から徒歩15分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity" data-place-name="二月堂">
                                    <h3>2:00 PM - 二月堂参拝</h3>
                                    <p>東大寺の二月堂から奈良の街並みを一望。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('東大寺二月堂') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            近鉄「奈良駅」から徒歩20分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity" data-place-name="浮見堂">
                                    <h3>4:30 PM - 浮見堂</h3>
                                    <p>夕暮れ時の鏡池に映る浮見堂の風景を楽しむ。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('奈良公園浮見堂') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            近鉄「奈良駅」から徒歩15分
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'amanohashidate')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">天橋立絶景プラン</h1>
                                <div class="plan-description">
                                    <p>日本三景の一つ、天橋立の美しい景観を楽しむ特別な一日。</p>
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
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity" data-place-name="天橋立ビューランド">
                                    <h3>9:00 AM - 天橋立ビューランド</h3>
                                    <p>ケーブルカーで展望台へ。名物「股のぞき」で天橋立を観賞。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('天橋立ビューランド') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            京都丹後鉄道「天橋立駅」から徒歩5分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:00 PM - 海鮮料理</h3>
                                    <p>新鮮な日本海の幸を堪能。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('天橋立周辺の食事処') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            天橋立周辺の食事処
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity">
                                    <h3>2:00 PM - 智恩寺参拝</h3>
                                    <p>日本三文殊の一つ、智恩寺を参拝。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('智恩寺') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            天橋立散策路を徒歩15分
                                        </a>
                                    </p>
                                </div>
                                <div class="activity">
                                    <h3>3:30 PM - 天橋立散策</h3>
                                    <p>松並木の道を散策しながら、両側の景色を楽しむ。</p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity">
                                    <h3>5:00 PM - 府中地区散策</h3>
                                    <p>古い町並みが残る府中地区で、地元の雰囲気を楽しむ。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('天橋立府中地区') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            京都丹後鉄道「天橋立駅」周辺
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($planId === 'himeji')
                    <div class="plan-section mb-5">
                        <div class="plan-header"
                            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset($backgroundImage) }}');">
                            <div class="header-content">
                                <h1 class="display-4">姫路城探訪プラン</h1>
                                <div class="plan-description">
                                    <p>世界遺産・姫路城と周辺の見どころを巡る充実の一日。</p>
                                </div>
                                <div class="plan-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <div>所要時間</div>
                                        <div>約8時間</div>
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
                            <div class="time-block morning">
                                <h2><i class="bi bi-sunrise"></i> 午前</h2>
                                <div class="activity" data-place-name="姫路城">
                                    <h3>9:00 AM - 姫路城</h3>
                                    <p>白鷺城とも呼ばれる美しい天守閣を見学。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR姫路駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            JR「姫路駅」から徒歩15分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block lunch">
                                <h2><i class="bi bi-sun"></i> 昼食</h2>
                                <div class="activity">
                                    <h3>12:00 PM - 姫路グルメ</h3>
                                    <p>姫路おでんや播州ラーメンなど、地元の味を堪能。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('JR姫路駅') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            鉄「姫路駅」からバスで15分
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="time-block afternoon">
                                <h2><i class="bi bi-sun"></i> 午後</h2>
                                <div class="activity" data-place-name="好古園">
                                    <h3>2:00 PM - 好古園</h3>
                                    <p>姫路城の隣接する日本庭園で四季折々の風景を楽しむ。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('好古園') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            姫路城に隣接
                                        </a>
                                    </p>
                                </div>
                                <div class="activity">
                                    <h3>3:30 PM - 城下町散策</h3>
                                    <p>江戸時代からの街並みが残る城下町を散策。</p>
                                </div>
                            </div>

                            <div class="time-block evening">
                                <h2><i class="bi bi-sunset"></i> 夕方</h2>
                                <div class="activity">
                                    <h3>5:00 PM - 夕暮れの姫路城</h3>
                                    <p>ライトアップされた姫路城の幻想的な姿を観賞。</p>
                                    <p class="access">
                                        <i class="bi bi-train-front"></i>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('姫路城三の丸広場') }}"
                                            target="_blank" class="text-decoration-none" style="color: #1B4B8F;">
                                            三の丸広場付近
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info mt-4">
                        <h2>指定されたプランが見つかりせん</h2>
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
    {{-- <!-- フッター要素を追加 -->
    <footer id="footer"></footer>

    <script src="{{ asset('js/common.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/planDetail.js') }}"></script>
</body>

</html>
