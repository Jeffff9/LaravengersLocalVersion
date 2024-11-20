<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <header id="header"></header>

    <div class="container py-4">
        <h1 class="mb-4">カート</h1>

        <!-- イベント情報を表示するセクション -->
        <div class="mb-4">
            <h2 class="h4 mb-3">追加したイベント</h2>
            <div id="cartEvents" class="accordion mb-4">
                <!-- JavaScriptでイベント情報が挿入されます -->
            </div>
        </div>

        <div class="text-center mt-4">
            <button id="makePlanButton" class="btn btn-primary btn-lg">
                <i class="bi bi-calendar-check"></i> プランを生成する
            </button>
        </div>
    </div>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
</body>

</html>
