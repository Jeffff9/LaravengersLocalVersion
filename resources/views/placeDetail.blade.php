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
    <style>
        body {
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            color: white;
            min-height: 100vh;
        }

        main {
            padding-top: 100px;
            padding-bottom: 50px;
        }

        /* タイトルスタイル */
        h2 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 2rem;
            color: #1B4B8F;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* コンテ��ツカード */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease forwards;
        }

        /* スライドショーコンテナ */
        .slide-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        /* 詳細情報スタイル */
        .detail-section {
            color: #333;
            line-height: 1.8;
        }

        .detail-section h3 {
            color: #1B4B8F;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .detail-section p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 1.2rem;
            line-height: 1.8;
        }

        .detail-section a {
            color: #D64B29;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .detail-section a:hover {
            color: #1B4B8F;
        }

        /* 地図コンテナ */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        /* カートボタン */
        .cart-button {
            background-color: #1B4B8F;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.2);
        }

        .cart-button:hover {
            background-color: #154178;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27, 75, 143, 0.3);
        }

        .cart-button i {
            font-size: 1.3rem;
        }

        /* アニメーション */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* モーダルスタイル */
        .modal-content {
            background: white;
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: none;
            padding: 20px 30px;
        }

        .modal-body {
            padding: 20px 30px;
            color: #333;
        }

        .modal-footer {
            border-top: none;
            padding: 20px 30px;
        }
    </style>
</head>

<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <h2>{{$place->placeName}}</h2>
            <div class="content-card">
                <div class="row">
                    <!-- 左側：スライドショー -->
                    <div class="col-md-6">
                        <div class="slide-container">
                            <div class="slides">
                                <img src="{{$place->im1}}" class="active">
                                <img src="{{$place->im2}}">
                                <img src="{{$place->im3}}">
                                <img src="{{$place->im4}}">
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
                                <p>{{$place->longDetail}}</p>

                                <!-- カートボタンを詳細の下に配置 -->
						        <button type="button"
                                                class="btn btn-primary btn-sm"
                                                style="z-index: 1;"
                                                onclick="addToCart({
                                                    id: '{{$place->placeNumber}}',
                                                    title: '{{$place->placeName}}',
                                                    description: '{{$place->shortDetail}}',
                                                    image_url: '{{ $place->im1 ?? 'https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp' }}',
                                                    location: '{{$place->address}}',
                                                    category: '{{$place->characteristics}}',
                                                    type: 'place'
                                                })">
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
                            <p><strong>営業時間：</strong>{{$place->openningHours}}</p>
                            <p><strong>休館日：</strong>無休</p>
                            <a href="{{$place->websiteLink}}" target="_blank" class="website-link">
                                <i class="fas fa-external-link-alt"></i> 公式サイトはこちら
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-card map-card">
                        <h3>アクセス</h3>
                        <div class="map-container">
                            {!! $place->googleMapLink !!}
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
            id: 1,
            title: '天王寺動物園',
            description: '天王寺動物園は、大阪市にある歴史ある動物園で、1915年に開園しました。総面積は約11ヘクタールあり、約180種類、1000頭以上の動物が飼育されています。',
            image_url: 'https://www.akira-seitai2.com/wp-content/uploads/2021/02/pixta_70263615_M-1536x1024.jpg',
            location: '大阪市天王寺区',
            category: '観光施設',
            type: 'place',
            details: {
                openingHours: '9:30～17:00 　5・9月の土日祝日は～18:00　※いずれも入園は一時間前まで',
                price: '大人：500円、子供：200円',
                access: '地下鉄御堂筋線動物園前駅より徒歩5分',
                facilities: ['駐車場', 'レストラン', 'お土産店'],
                closedDays: '月曜日（祝日の場合は翌日）、年末年始（12月29日～1月1日）',
                description: `
                    天王寺動物園は、大阪市にある歴史ある動物園で、1915年に開園しました。
                    総面積は約11ヘクタールあり、約180種類、1000頭以上の動物が飼育されています。
                    園内はアフリカサバンナやアジアの森林など、動物たちの自然環境を再現したエリアが設けられ、
                    動物の生態を身近に感じられるよう工夫されています。
                `,
                highlights: [
                    'ライオン、ゾウ、キリン、ホッキョクグマなどの人気動物',
                    '動物の食事タイムや触れ合いイベント',
                    '天王寺公園に隣接'
                ],
                website: 'https://www.tennojizoo.jp/'
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
