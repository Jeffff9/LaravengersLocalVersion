<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event['title'] }} - イベント詳細</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
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

        /* コンテンツカード */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease forwards;
        }

        /* タイトルスタイル */
        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 2rem;
            color: #1B4B8F;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* イベント情報 */
        .event-info {
            color: #555;
            line-height: 1.8;
        }

        .event-info i {
            color: #1B4B8F;
        }

        .event-info p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 1.2rem;
        }

        .event-description {
            color: #555;
        }

        .event-description h2 {
            color: #1B4B8F;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .event-description p {
            color: #555 !important;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* ステータスバッジ */
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        /* ボタン */
        .btn-primary {
            background-color: #1B4B8F;
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.2);
        }

        .btn-primary:hover {
            background-color: #154178;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27, 75, 143, 0.3);
        }

        .btn-outline-secondary {
            color: #555;
            border-color: #555;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            color: #1B4B8F;
            border-color: #1B4B8F;
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

        /* モーダル */
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

        .btn-map {
            color: #1B4B8F;
            border-color: #1B4B8F;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-map:hover {
            background-color: #1B4B8F;
            color: white;
        }
    </style>
</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <div class="content-card">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $event['image_url'] }}" alt="{{ $event['title'] }}"
                            class="img-fluid rounded shadow-sm mb-4" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $event['title'] }}</h1>

                        <div class="status-badge
                            @if($event['status'] === '開催予定') bg-info
                            @elseif($event['status'] === '開催中') bg-success
                            @else bg-secondary
                            @endif text-white">
                            {{ $event['status'] }}
                        </div>

                        <div class="event-info">
                            <p>
                                <i class="bi bi-calendar-event me-2"></i>
                                開催期間：{{ \Carbon\Carbon::parse($event['start_date'])->format('Y年m月d日') }}
                                @if($event['start_date'] !== $event['end_date'])
                                    ～ {{ \Carbon\Carbon::parse($event['end_date'])->format('Y年m月d日') }}
                                @endif
                            </p>

                            <p>
                                <i class="bi bi-geo-alt me-2"></i>
                                開催場所：{{ $event['location'] }}
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event['location']) }}"
                                class="btn btn-map btn-sm btn-outline-primary ms-2"
                                target="_blank">
                                    <i class="bi bi-map"></i> 地図を見る
                                </a>
                            </p>

                            <p>
                                <i class="bi bi-tag me-2"></i>
                                カテゴリー：{{ $event['category'] }}
                            </p>
                        </div>

                        <div class="event-description mt-4">
                            <h2>イベント詳細</h2>
                            <p>{{ $event['description'] }}</p>
                        </div>

                        <div class="mt-4 d-flex gap-3">
                            <button onclick="addToCart({{ json_encode($event) }})" class="btn btn-primary">
                                <i class="bi bi-cart-plus me-2"></i>カートに追加
                            </button>
                            <a href="/Event" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>イベント一覧に戻る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">カートに追加しました</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    イベントをカートに追加しました。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">続けて見る</button>
                    <a href="/Cart" class="btn btn-primary">カートを見る</a>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        function addToCart(event) {
            // イベントの詳細情報を追加
            event.details = {
                start_date: '{{ $event['start_date'] }}',
                end_date: '{{ $event['end_date'] }}',
                status: '{{ $event['status'] }}',
                location: '{{ $event['location'] }}',
                category: '{{ $event['category'] }}',
                description: '{{ $event['description'] }}',
                access_info: '最寄り駅からのアクセス情報',
                price: '入場料や参加費用の情報',
                organizer: 'イベント主催者情報',
                contact: '連絡先情報',
                website: 'イベントの公式サイトURL'
            };
            event.type = 'event';  // イベントタイプを明示

            // 現在のカートの内容を取得
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');

            // イベントをカートに追加
            cart.push(event);

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

        // ページ読み込み時にカート数を更新
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
</body>
</html>
