const createPlanButton = document.getElementById('createPlanButton');

createPlanButton.onclick = function () {
    const startDate = document.getElementById('startDate')?.value || '';
    const startTime = document.getElementById('startTime')?.value || '';
    const endTime = document.getElementById('endTime')?.value || '';
    const departurePlace = document.getElementById('departurePlace')?.value || '';
    const destination = document.getElementById('destination')?.value || '';
    const lunchTime = document.getElementById('lunchTime');
    const dinnerTime = document.getElementById('dinnerTime');
    const priority = [];
    const startStation = document.getElementById('startStation')?.value || '';
    const reachStation = document.getElementById('reachStation')?.value || '';

    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    if (cart.length === 0) {
        alert('プランを生成するにはイベントを追加してください。');
        return;
    }

    for (let i = 0; i < cart.length; i++) {
        const durationSelect = document.getElementById(`durationSelect${i}`)?.value;
        const priorityValue = document.getElementById(`placePriority${i}`)?.value;
        const item = cart[i];
        priority.push({
            title: item.title,
            priority: priorityValue || '1',
            duration: durationSelect || '60',
            details: item.details
        });
    }

    const placesList = priority.map(place => {
        return `${place.title}（優先度: ${place.priority}, 滞在時間: ${place.duration}分）`;
    }).join('、');

/////////////////////セット///////////////////////
    const fields = {
        startDate: '訪問日',
        startTime: '開始時間',
        endTime: '終了時間',
        departurePlace: '出発地',
        destination: '到着地'
    };

    const errorMessage = [];
    for (const [fieldId, fieldName] of Object.entries(fields)) {
        const fieldValue = document.getElementById(fieldId)?.value || '';
        if (!fieldValue) {
            errorMessage.push(fieldName);
        }
    };

    if (errorMessage.length > 0) {
        alert(errorMessage.join('、') + "を選択してください。");
        return;
    }
///////////////////////////////////////////////////
    let lunchTimeInfo = '';
    if(lunchTime.checked){
        lunchTimeInfo = '一時間ランチタイムを追加して'
    };
    let dinnerTimeInfo = '';
    if(dinnerTime.checked){
        dinnerTimeInfo = '一時間ディナータイムを追加して'
    };
/////////////////////////////////////////////////////
    let startStationInfo = '';
    if(startStation){
        startStationInfo = startStation;
    }

    let reachStationInfo = '';
    if(startStation){
        reachStationInfo = reachStation;
    }

    const question = `
以下の場所を訪れるプランを作成してください：
${placesList}
条件：
- 訪問日: ${startDate}
- 開始時間: ${startTime}時
- 終了時間: ${endTime}時
- 出発地: ${departurePlace},${startStationInfo}
- 到着地: ${destination},${reachStationInfo}
- ${lunchTimeInfo}
- ${dinnerTimeInfo}
乗換案内、営業時間、アクセス、料金を確認してください。
日本語で具体的な時間のスケジュールを作成してください。
アドバイスをください。
`;

    localStorage.setItem('question', JSON.stringify(question));
    window.location.href = "/Result";
}

document.addEventListener('DOMContentLoaded', function () {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const cartEventsDiv = document.getElementById('cartEvents');
    const timeSelectorContainer = document.querySelector('.time-selector-container');

    if (cart.length === 0) {
        cartEventsDiv.innerHTML = '<p class="text-muted">カートにイベントが追加さ���ていません。</p>';
        timeSelectorContainer.style.display = 'none';
        return;
    }

    timeSelectorContainer.style.display = 'block';
    cartEventsDiv.innerHTML = '';

    cart.forEach((item, index) => {
        // デフォルト画像URLを設定
        const defaultImageUrl = 'https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp';
        const imageUrl = item.image_url || defaultImageUrl;

        const eventHtml = `
            <div class="accordion-item" data-item-id="${item.id}">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#item-${index}" aria-expanded="true">
                        <div class="d-flex align-items-center w-100">
                            <img src="${imageUrl}"
                                 alt="${item.title}"
                                 class="rounded me-3"
                                 style="width: 60px; height: 60px; object-fit: cover;"
                                 onerror="this.src='${defaultImageUrl}'">
                            <div class="flex-grow-1">
                                <h5 class="mb-0">${item.title}</h5>
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> ${item.location}
                                </small>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-primary">${item.type === 'event' ? 'イベント' : '観光施設'}</span>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="item-${index}" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h6>基本情報${index}</h6>
                                <p class="mb-2">${item.description}</p>
                                ${item.details ? `
                                    <div class="details-info mt-3">
                                        ${item.type === 'event' ? `
                                            <p><strong>開催期間:</strong> ${item.details.start_date} ～ ${item.details.end_date}</p>
                                            <p><strong>状態:</strong> ${item.details.status}</p>
                                        ` : `
                                            <p><strong>営業時間:</strong> ${item.details.openingHours}</p>
                                            <p><strong>料金:</strong> ${item.details.price}</p>
                                            <p><strong>アクセス:</strong> ${item.details.access}</p>
                                            ${item.details.website ? `
                                                <p><strong>公式サイト:</strong>
                                                    <a href="${item.details.website}" target="_blank">${item.details.website}</a>
                                                </p>
                                            ` : ''}
                                        `}
                                    </div>
                                ` : ''}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">行く順番：</label>
                                <select id="placePriority${index}" class="form-select" onchange="updateEventOrder(${index}, this.value)">
                                    ${generateOrderOptions(cart.length, index)}
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">滞在時間：</label>
                                <select id="durationSelect${index}" class="form-select" onchange="updateEventDuration(${index}, this.value)">
                                    <option value="30">30分</option>
                                    <option value="60">1時間</option>
                                    <option value="90">1時間30分</option>
                                    <option value="120">2時間</option>
                                    <option value="150">2時間30分</option>
                                    <option value="180">3時間</option>
                                    <option value="210">3時間30分</option>
                                    <option value="240">4時間</option>
                                    <option value="">他（自分で入力）</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button onclick="removeFromCart(${index})" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i> 削除
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        cartEventsDiv.insertAdjacentHTML('beforeend', eventHtml);
    });
});



function generateOrderOptions(total, current) {
    let options = '';
    for (let i = 1; i <= total; i++) {
        options += `<option value="${i}" ${i === current + 1 ? 'selected' : ''}>${i}番目</option>`;
    }
    return options;
}

function updateEventOrder(index, order) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart[index].order = parseInt(order);
    localStorage.setItem('cart', JSON.stringify(cart));
}

function updateEventDuration(index, duration) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart[index].duration = parseInt(duration);
    localStorage.setItem('cart', JSON.stringify(cart));
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    location.reload();
}
