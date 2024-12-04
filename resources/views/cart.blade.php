<?php
if (isset($_POST)) {
    $question = file_get_contents('php://input');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>カート - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

<body>
    <header id="header"></header>

    <div class="container py-4">
        <div class="cart-container">
            <h1 class="cart-title">カート</h1>

            <div class="mb-4">
                <h2 class="h4 mb-3">追加したイベント</h2>
                <div id="cartEvents" class="accordion mb-4">
                    <!-- JavaScriptでイベント情報が挿入されます -->
                </div>
            </div>

            <div class="time-selector-container" style="display: none;">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <h3 class="h5 mb-4 text-center">旅行日程の設定</h3>
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-calendar-event"></i> 開始日
                        </label>
                        <input type="date" id="startDate" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-calendar-check"></i> 終了日
                        </label>
                        <input type="date" id="endDate" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-clock"></i> 開始時間
                        </label>
                        <select id="startTime" class="form-select">
                            <option value="">選択してください</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-clock-history"></i> 終了時間
                        </label>
                        <select id="endTime" class="form-select">
                            <option value="">選択してください</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button id="createPlanButton" class="btn btn-generate-plan">
                        <i class="bi bi-calendar-check"></i> プランを生成する
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
</body>

</html>
