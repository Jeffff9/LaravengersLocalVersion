<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">

</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <!-- ヘッダーセクション -->
            <div class="text-center mb-5 animate__animated animate__fadeIn">
                <h1 class="display-4 fw-bold"
                    style="font-size: 3.5rem;
                           letter-spacing: 0.05em;
                           margin-bottom: 1rem;
                           background: linear-gradient(45deg, #ffffff, #e0e0e0);
                           -webkit-background-clip: text;
                           -webkit-text-fill-color: transparent;
                           text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);">
                    イベント情報
                </h1>
            </div>

            <!-- 検索フィルター -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" id="keyword" class="form-control" placeholder="キーワードで検索">
                </div>
                <div class="col-md-4">
                    <select id="area" class="form-select">
                        <option value="">エリアを選択</option>
                        <option value="osaka">大阪</option>
                        <option value="kyoto">京都</option>
                        <option value="kobe">神戸</option>
                        <option value="nara">奈良</option>
                        <option value="wakayama">和歌山</option>
                        <option value="shiga">滋賀</option>
                        <option value="hyogo">兵庫</option>
                        <option value="otsu">大津</option>
                        <option value="himeji">姫路</option>
                        <option value="nishinomiya">西宮</option>
                        <option value="amagasaki">尼崎</option>
                        <option value="kishiwada">岸和田</option>
                        <option value="ise">伊勢</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="category" class="form-select">
                        <option value="">カテゴリーを選択</option>
                        <option value="祭り">祭り</option>
                        <option value="花火大会">花火大会</option>
                        <option value="グルメ">グルメ</option>
                        <option value="音楽">音楽</option>
                        <option value="イルミネーション">イルミネーション</option>
                        <option value="伝統行事">伝統行事</option>
                        <option value="アート">アート</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="自然">自然</option>
                        <option value="文化">文化</option>
                        <option value="マルシェ">マルシェ</option>
                        <option value="体験">体験</option>
                        <option value="展示">展示</option>
                        <option value="パフォーマンス">パフォーマンス</option>
                        <option value="ライトアップ">ライトアップ</option>
                        <option value="フェスティバル">フェスティバル</option>
                        <option value="ワークショップ">ワークショップ</option>
                        <option value="マーケット">マーケット</option>
                        <option value="パレード">パレード</option>
                    </select>
                </div>
            </div>

            <!-- イベント一覧 -->
            <div id="event-list" class="row row-cols-1 row-cols-md-3 g-4">
                <!-- イベントカードがここに動的に挿入されます -->
            </div>

            <!-- ローディング表示 -->
            <div id="loading" class="text-center py-4 d-none">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!-- 検索結果なしの表示 -->
            <div id="no-results" class="text-center py-4 d-none">
                <p class="text-muted">該当するイベントが見つかりませんでした。</p>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/event.js') }}"></script>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
