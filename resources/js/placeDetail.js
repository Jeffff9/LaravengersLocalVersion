
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
