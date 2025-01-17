<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">

</head>
<body>
    <header id="header"></header>

    <!-- Navigation Bar -->
    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main style="background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%); min-height: 100vh; padding-top: 80px;">
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

    <!-- フッター要素を追加 -->
<footer id="footer"></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
