<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>観光地詳細 - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slideshow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/placeDetail.css') }}">
</head>

<body>
    <header id="header"></header>

    <main></main>
        <div class="container">
            <h2>{{ $place->placeName }}</h2>
            <div class="content-card">
                <div class="row">
                    <!-- 左側：スライドショー -->
                    <div class="col-md-6">
                        <div class="slide-container">
                            <div class="slides">
                                <img src="{{ $place->im1 }}" class="active">
                                <img src="{{ $place->im2 }}">
                                <img src="{{ $place->im3 }}">
                                <img src="{{ $place->im4 }}">
                            </div>

                            <div class="buttons">
                                <span class="next">&#10095;</span>
                                <span class="prev">&#10094;</span>
                            </div>

                            <div class="dotsContainer">
                                <div class="dot active" attr='0' onclick="switchImage(this)"></div>
                                <div class="dot" attr='1' onclick="switchImage(this)"></div>
                                <div class="dot" attr='2' onclick="switchImage(this)"></div>
                                <div class="dot" attr='3' onclick="switchImage(this)"></div>
                                <div class="dot" attr='4' onclick="switchImage(this)"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 右側：詳細情報 -->
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="detail-content">
                                <h3>詳細紹介</h3>
                                <p>{{ $place->longDetail }}</p>

                                <!-- カートボタンを詳細の下に配置 -->
                                <button onclick="addToCart(placeData)" class="cart-button position-absolute top-0 end-0"
                                    style="margin: 20px; background-color: #1B4B8F; color: white;">
                                    <i class="bi bi-cart-plus"></i> カートに追加
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 営業時間とマップを横並びに -->
            <div class="row info-row">
                <div class="col-md-6">
                    <div class="content-card info-card">
                        <h3>営業情報</h3>
                        <div class="info-content">
                            <p><strong>営業時間：</strong>{{ $place->openningHours }}</p>
                            <p><strong>料金：</strong>
                            @if($place->placeName === '天王寺動物園')
                                大人500円、子供：200円
                            @elseif($place->placeName === '大阪城')
                                大人600円、中高生450円、小学生300円
                            @else
                                料金については公式サイトをご確認ください
                            @endif
                            </p>
                            <p><strong>アクセス：</strong>{{ $place->access ?? '地下鉄御堂筋線動物園前駅より徒歩5分' }}</p>
                            <a href="{{ $place->websiteLink }}" target="_blank" class="website-link">
                                <i class="fas fa-external-link-alt"></i> 公式サイトはこちら
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-card map-card">
                        <h3>アクセス</h3>
                        <div class="map-container">
                            <div class="map-wrapper">
                                {!! $place->googleMapLink !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/slideshow.js') }}"></script>
    <script>
        const placeData = {
            id: {{ $place->placeNumber }},
            title: '{{ $place->placeName }}',
            description: '{{ $place->shortDetail }}',
            image_url: '{{ $place->im1 }}',
            location: '{{ $place->detailAddress }}',
            category: '{{ $place->characteristics }}',
            type: 'place',
            details: {
                openingHours: '{{ $place->openningHours }}',
                price: @json($place->placeName === '天王寺動物園' ? '大人500円、子供：200円' :
                       ($place->placeName === '大阪城' ? '大人600円、中高生450円、小学生300円' :
                       '料金については公式サイトをご確認ください')),
                access: '{{ $place->access ?? "地下鉄御堂筋線動物園前駅より徒歩5分" }}',
                facilities: ['駐車場', 'レストラン', 'お土産店'],
                description: '{{ $place->longDetail }}',
                website: '{{ $place->websiteLink }}'
            }
        };

        function addToCart(place) {
            // 現在のカートの内容を取得
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');

            // 観光地をカートに追加
            cart.push(place);

            // カートを保存
            localStorage.setItem('cart', JSON.stringify(cart));

            // カートの数を更新
            updateCartCount();

            // モーダルを表示
            const modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = cart.length;
            }
        }

        // ページ読込み時にカート数を更新
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">カートに追加しました</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    観光地をカートに追加しました。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">続けて見る</button>
                    <a href="/Cart" class="btn btn-primary">カートを見る</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
