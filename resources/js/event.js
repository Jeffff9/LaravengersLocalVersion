
function addToCart(event) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    event.type = 'event';  // イベントタイプを追加
    cart.push(event);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
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

function createEventCard(event) {
    return `
                <div class="col">
                    <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #e8f4ff 100%); border: none; border-radius: 25px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                        <div class="position-relative">
                            <img src="${event.image_url}" class="card-img-top" alt="${event.title}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge" style="background-color: #1B4B8F; font-size: 0.8rem; padding: 0.5em 1em; border-radius: 30px;">
                                    ${event.category}
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column" style="padding: 1.5rem; background: linear-gradient(135deg, #ffffff 0%, #e8f4ff 100%);">
                            <h5 class="card-title" style="color: #1B4B8F; font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem;">
                                ${event.title}
                            </h5>
                            <p class="card-text" style="color: #333; font-size: 0.95rem; line-height: 1.6; flex-grow: 1;">
                                ${event.description}
                            </p>
                            <div class="mt-3">
                                <p class="mb-2" style="display: flex; align-items: center; gap: 8px;">
                                    <i class="bi bi-calendar me-2" style="color: #1B4B8F;"></i>
                                    <span style="color: #1B4B8F; font-weight: 600;">開催期間:</span>
                                    <span style="color: #333; font-weight: 500;">
                                        ${event.date || `${event.start_date} ～ ${event.end_date}`}
                                    </span>
                                </p>
                                <p class="mb-3" style="display: flex; align-items: center; gap: 8px;">
                                    <i class="bi bi-geo-alt me-2" style="color: #1B4B8F;"></i>
                                    <span style="color: #333; font-weight: 500;">${event.location}</span>
                                </p>
                                <div class="d-flex gap-2 mt-auto">
                                    <a href="/Event/${event.id}"
                                       class="btn btn-outline-primary flex-grow-1"
                                       style="border-radius: 30px; padding: 8px 20px; font-weight: 600; border-color: #1B4B8F; color: #1B4B8F; transition: all 0.3s ease;">
                                        <i class="bi bi-info-circle me-1"></i> 詳細を見る
                                    </a>
                                    <button onclick="addToCart(${JSON.stringify(event)})"
                                            class="btn btn-primary flex-grow-1"
                                            style="border-radius: 30px; padding: 8px 20px; font-weight: 600; background-color: #1B4B8F; border: none; transition: all 0.3s ease;">
                                        <i class="bi bi-cart-plus me-1"></i> カートに追加
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
}
