document.addEventListener('DOMContentLoaded', function() {
    // カートに追加ボタンのイベントリスナーを設定
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const placeData = JSON.parse(this.dataset.place);
            addToCart(placeData);
        });
    });
});

function addToCart(place) {
    // ローカルストレージからカートを取得
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // 既に追加されているかチェック
    const existingItem = cart.find(item => item.placeNumber === place.placeNumber);

    if (existingItem) {
        alert('この場所は既にカートに追加されています。');
        return;
    }

    // カートに追加
    cart.push(place);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert('カートに追加しました！');
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
}

function toggleFilter() {
    const filterContent = document.getElementById('filterContent');
    const filterIcon = document.getElementById('filterIcon');

    filterContent.classList.toggle('collapsed');
    filterIcon.classList.toggle('rotated');
}

function toggleSection(sectionId) {
    const content = document.getElementById(sectionId);
    const header = content.previousElementSibling;

    // トグル
    content.classList.toggle('show');
    header.classList.toggle('active');

    // アニメーション用の高さ設定
    if (content.classList.contains('show')) {
        content.style.maxHeight = content.scrollHeight + "px";
    } else {
        content.style.maxHeight = "0";
    }
}
// 初期状態で開いておく場合は以下をコメントアウト
/*
document.addEventListener('DOMContentLoaded', () => {
    const sections = ['category-section', 'area-section'];
    sections.forEach(sectionId => {
        const content = document.getElementById(sectionId);
        const header = content.previousElementSibling;

        content.classList.add('show');
        header.classList.add('active');
        content.style.maxHeight = content.scrollHeight + "px";
    });
});
*/

