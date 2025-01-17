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
                        <img src="{{ asset('images/plans/osaka_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="大阪の観光スポット">
                        <div class="card-body">
                            <h5 class="card-title">大阪のプラン</h5>
                            <p class="card-text">大阪一日遊び</p>
                            <a href="PlanDetail/osaka" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/kobe_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">神戸のプラン</h5>
                            <p class="card-text">神戸一日遊び</p>
                            <a href="PlanDetail/kobe" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/kyoto_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">京都のプラン</h5>
                            <p class="card-text">京都一日遊び</p>
                            <a href="PlanDetail/kyoto" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/nara_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">奈良のプラン</h5>
                            <p class="card-text">奈良一日遊び</p>
                            <a href="PlanDetail/nara" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/wakayama_plans.jpeg') }}"
                            class="card-img-top card-img-fixed" alt="和歌山城と桜">
                        <div class="card-body">
                            <h5 class="card-title">和歌山のプラン</h5>
                            <p class="card-text">和歌山一日遊び</p>
                            <a href="PlanDetail/wakayama" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/shiga_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="琵琶湖と比叡山">
                        <div class="card-body">
                            <h5 class="card-title">滋賀のプラン</h5>
                            <p class="card-text">滋賀一日遊び</p>
                            <a href="PlanDetail/shiga" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/kyoto_arashiyama_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="嵐山の竹林">
                        <div class="card-body">
                            <h5 class="card-title">京都嵐山プラン</h5>
                            <p class="card-text">嵐山・渡月橋散策</p>
                            <a href="PlanDetail/arashiyama" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/usj_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="USJ">
                        <div class="card-body">
                            <h5 class="card-title">USJプラン</h5>
                            <p class="card-text">ユニバーサル・スタジオ・ジャパン</p>
                            <a href="PlanDetail/usj" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/ArimaOnsen_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="有馬温泉">
                        <div class="card-body">
                            <h5 class="card-title">有馬温泉プラン</h5>
                            <p class="card-text">日本三古湯を満喫</p>
                            <a href="PlanDetail/arima" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/narakoenn_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="奈良公園">
                        <div class="card-body">
                            <h5 class="card-title">奈良公園プラン</h5>
                            <p class="card-text">鹿と触れ合う癒しの旅</p>
                            <a href="PlanDetail/narapark" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/Amanohashidate_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="天橋立">
                        <div class="card-body">
                            <h5 class="card-title">天橋立プラン</h5>
                            <p class="card-text">日本三景を満喫</p>
                            <a href="PlanDetail/amanohashidate" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/plans/HimejiCastle_plans.jpg') }}"
                            class="card-img-top card-img-fixed" alt="姫路城">
                        <div class="card-body">
                            <h5 class="card-title">姫路城プラン</h5>
                            <p class="card-text">世界遺産の白鷺城を巡る</p>
                            <a href="PlanDetail/himeji" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

    <!-- フッター要素を追加 -->
<footer id="footer"></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/common.js') }}"></script>
</body>

</html>
