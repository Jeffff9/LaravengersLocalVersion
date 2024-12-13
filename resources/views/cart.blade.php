<?php
if (isset($_POST)) {
    $question = file_get_contents('php://input');
}
$place = ['大阪', '京都', '奈良', '神戸', '和歌山', '滋賀', '兵庫'];
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
                            <i class="bi bi-calendar-event"></i> 出発期日(＊必要)
                        </label>
                        <input type="date" id="startDate" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-clock"></i> 開始時間(＊必要)
                        </label>
                        <select id="startTime" class="form-select">
                            <option value="">選択してください</option>
                            <?php for ($i = 6; $i < 16; $i++): ?>
                                <option value="<?= htmlspecialchars($i) ?>"><?= htmlspecialchars($i) ?>:00</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-clock-history"></i> 終了時間(＊必要)
                        </label>
                        <select id="endTime" class="form-select">
                            <option value="">選択してください</option>
                            <?php for ($i = 16; $i < 24; $i++): ?>
                                <option value="<?= htmlspecialchars($i) ?>"><?= htmlspecialchars($i) ?>:00</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-building-fill-down"></i> 出発地(＊必要)
                        </label>
                        <select id="departurePlace" class="form-select">
                            <option value="">選択してください</option>
                            <?php foreach ($place as $key => $value): ?>
                                <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="bi bi-building-fill-up"></i> 到着地(＊必要)
                        </label>
                        <select id="destination" class="form-select">
                            <option value="">選択してください</option>
                            <?php foreach ($place as $key => $value): ?>
                                <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="lunchtime">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                昼ご飯時間追加
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                夕飯時間追加
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                考えてる
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                考えてる
                            </label>
                        </div>
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
