<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プラン - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plan.css') }}">

</head>

<body>
    <!-- Header Section -->
    <header id="header"></header>

    <!-- Navigation Bar -->
    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <!-- Main Content Section -->
    <main>
        <div class="container">
            <div class="row text-center mb-4">
                <h2>定番プラン</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                            class="card-img-top card-img-fixed card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">ミンのプラン</h5>
                            <p class="card-text">大阪一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">サンのプラン</h5>
                            <p class="card-text">神戸一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">タムのプラン</h5>
                            <p class="card-text">京都一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">ホイのプラン</h5>
                            <p class="card-text">奈良一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

    <footer id="footer"></footer>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
