<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>観光プラン | 結果</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">
</head>

<body>
    <header id="header">
        <nav class="navbar">
            <div class="container">
                <button class="btn btn-outline-secondary" onclick="window.history.back()">
                    <i class="bi bi-arrow-left"></i> 戻る
                </button>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            <div class="result-card">
                <div class="result-header">
                    <h2><i class="bi bi-calendar-check"></i> 観光プラン</h2>
                    <div class="result-date">{{ date('Y年m月d日') }}</div>
                </div>

                <div class="result-content">
                    {{-- <h5><i class="bi bi-search"></i> リクエスト内容</h5> --}}
                    <h5 id="loading">Loading</h5>
                </div>

                <div class="citations-content">
                    <h5 class="citations-tittle"></h5>
                    <p class="citations"></p>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="savePlan()">
                        <i class="bi bi-save"></i> 保存
                    </button>
                    <button class="btn btn-success" onclick="sharePlan()">
                        <i class="bi bi-share"></i> 共有
                    </button>
                    <button class="btn btn-info" onclick="window.print()">
                        <i class="bi bi-printer"></i> 印刷
                    </button>
                    <a href="/Cart" class="btn btn-secondary">
                        <i class="bi bi-pencil"></i> 編集
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/result.js') }}"></script>
</body>

</html>
