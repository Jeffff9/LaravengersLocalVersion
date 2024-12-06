document.addEventListener('DOMContentLoaded', function() {
    // カートに追加ボタンのイベントリスナーを設定
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const placeData = JSON.parse(this.dataset.place);
            addToCart(placeData);
        });
    });
});

function addToCart(item) {
    // 現在のカートの内容を取得
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    // 同じアイテムが既にカートに存在するかチェック
    const existingItem = cart.find(cartItem =>
        cartItem.id === item.id && cartItem.type === item.type
    );

    if (existingItem) {
        // 既に追加されている場合は通知
        showNotification('この観光地は既にカートに追加されています。');
        return;
    }

    // 新しいアイテムをカートに追加
    cart.push({
        id: item.id,
        type: item.type,
        title: item.title,
        location: item.location,
        image_url: item.image_url,
        description: item.description,
        category: item.category,
        order: cart.length + 1,  // デフォルトの順番
        duration: 60  // デフォルトの滞在時間（分）
    });

    // カートを更新
    localStorage.setItem('cart', JSON.stringify(cart));

    // カート数を更新（common.jsの関数を呼び出し）
    updateCartCount();

    // 成功通知を表示
    showNotification('カートに追加しました！');
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

// 通知を表示する関数
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;

    // スタイルを設定
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        color: #333;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
    `;

    document.body.appendChild(notification);

    // 3秒後に通知を消す
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s ease-out forwards';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// アニメーションのスタイルを追加
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

