document.title = "関西巡り"

// ヘッダー要素の作成を修正
function createHeader() {
    const header = document.getElementById('header');
    header.innerHTML = `
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <i class="bi bi-compass"></i> 関西巡り
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/Place">
                                <i class="bi bi-map"></i> 観光地
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/Event">
                                <i class="bi bi-calendar-event"></i> イベント
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/Plan">
                                <i class="bi bi-journal-text"></i> プラン
                            </a>
                        </li>
                    </ul>

                    <!-- 検索フォームを改善 -->
                    <div class="search-box me-3">
                        <div class="search-wrapper">
                            <i class="bi bi-search search-icon"></i>
                            <input type="search" class="search-input" placeholder="観光地を検索...">
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="/Cart" class="nav-link cart-button me-2">
                            <i class="bi bi-cart3"></i>
                            <span>カート</span>
                            <span class="cart-count">0</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="/login" class="nav-link login-button">
                            <i class="bi bi-person-circle"></i>
                            <span>ログイン</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    `;

    // スタイルを追加
    const style = document.createElement('style');
    style.textContent = `
        /* ナビゲーションバーのスタイル */
        .navbar {
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* 背景との一体感を出すためのオーバーレイ */
        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            backdrop-filter: blur(10px);
            z-index: -1;
        }

        /* ナビゲーションのカードとログインボタンの修正 */
        .nav-link.main-menu {
            color: #ffffff !important;
            font-size: 1.1rem;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 8px 20px !important;
            margin: 0 5px;
        }

        .nav-link.main-menu:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* カートボタンの修正 */
        .cart-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 10px 25px !important;
            border-radius: 25px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            margin-right: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .cart-button i {
            font-size: 1.2rem;
            color: #ffffff;
        }

        .cart-button span {
            color: #ffffff !important;
            font-weight: 600;
        }

        /* ログインボタンの修正 */
        .login-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 10px 25px !important;
            border-radius: 25px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .login-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .login-button i {
            font-size: 1.2rem;
            margin-right: 8px;
            color: #ffffff;
        }

        .login-button span {
            color: #ffffff !important;
            font-weight: 600;
        }

        /* 検索ボックスのスタイル */
        .search-box {
            position: relative;
        }

        .search-wrapper {
            position: relative;
            width: 300px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            z-index: 1;
        }

        .search-input {
            width: 100%;
            padding: 10px 20px 10px 45px;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 0.95rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
            outline: none;
        }

        @media (max-width: 991.98px) {
            .search-wrapper {
                width: 100%;
                margin: 10px 0;
            }
        }
    `;
    document.head.appendChild(style);
}

// ページ読み込み時にヘッダーを作成
document.addEventListener('DOMContentLoaded', function() {
    createHeader();
    // カート数の更新
    updateCartCount();
});

// カート数を更新する関数
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
}

