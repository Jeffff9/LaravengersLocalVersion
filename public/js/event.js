document.addEventListener('DOMContentLoaded', function() {
    const events = [
        {
            id: 1,
            title: "天神祭",
            description: "大阪天満宮の氏祭で、日本三大祭の一つ。船渡御や奉納花火など、壮大な祭事が行われます。",
            image_url: "/images/events/1.jpg",
            category: "祭り",
            start_date: "2024-07-24",
            end_date: "2024-07-25",
            location: "大阪天満宮",
            price: 0
        },
        {
            id: 2,
            title: "祇園祭",
            description: "京都の八坂神社の祭礼で、約1100年の歴史を持つ日本を代表する祭り。山鉾巡行が有名です。",
            image_url: "/images/events/2.jpg",
            category: "祭り",
            start_date: "2024-07-01",
            end_date: "2024-07-31",
            location: "八坂神社",
            price: 0
        },
        {
            id: 3,
            title: "なにわ淀川花火大会",
            description: "大阪を代表する花火大会。約4000発の花火が夜空を彩ります。",
            image_url: "/images/events/3.jpg",
            category: "花火大会",
            date: "2024-08-08",
            location: "淀川河川公園",
            price: 0
        },
        {
            id: 4,
            title: "神戸ルミナリエ",
            description: "阪神・淡路大震災の鎮魂と復興への願いを込めて開催される光の祭典。",
            image_url: "/images/events/4.jpg",
            category: "イルミネーション",
            start_date: "2024-12-01",
            end_date: "2024-12-12",
            location: "神戸市中央区",
            price: 0
        },
        {
            id: 5,
            title: "奈良燈花会",
            description: "奈良の夏の風物詩。約2万個のろうそくが奈良公園を幻想的に照らします。",
            image_url: "/images/events/5.jpg",
            category: "イベント",
            start_date: "2024-08-05",
            end_date: "2024-08-14",
            location: "奈良公園",
            price: 0
        },
        {
            id: 6,
            title: "京都五山送り火",
            description: "お盆の夜空に浮かび上がる「大」の字。京都の伝統行事です。",
            image_url: "/images/events/6.jpg",
            category: "祭り",
            date: "2024-08-16",
            location: "京都市内の五山",
            price: 0
        },
        {
            id: 7,
            title: "住吉祭",
            description: "住吉大社の夏祭り。御鳳輦(ごほうれん)渡御が有名です。",
            image_url: "/images/events/7.jpg",
            category: "祭り",
            start_date: "2024-07-30",
            end_date: "2024-08-01",
            location: "住吉大社",
            price: 0
        },
        {
            id: 8,
            title: "神戸まつり",
            description: "神戸の街を彩るサンバパレードなど、国際色豊かなお祭り。",
            image_url: "/images/events/8.jpg",
            category: "祭り",
            date: "2024-05-19",
            location: "神戸市中央区",
            price: 0
        },
        {
            id: 9,
            title: "葵祭",
            description: "京都三大祭の一つ。平安時代さながらの優雅な時代行列。",
            image_url: "/images/events/9.jpg",
            category: "祭り",
            date: "2024-05-15",
            location: "下鴨神社、上賀茂神社",
            price: 0
        },
        {
            id: 10,
            title: "なら燈火会",
            description: "奈良の夜を幻想的に彩るろうそくの光のイベント。",
            image_url: "/images/events/10.jpg",
            category: "イベント",
            start_date: "2024-08-05",
            end_date: "2024-08-14",
            location: "奈良公園周辺",
            price: 0
        },
        {
            id: 11,
            title: "みなとこうべ海上花火大会",
            description: "神戸港を舞台に繰り広げられる華やかな花火大会。",
            image_url: "/images/events/11.jpg",
            category: "花火大会",
            date: "2024-08-03",
            location: "神戸港",
            price: 0
        },
        {
            id: 12,
            title: "京都食博",
            description: "京都の伝統的な食文化を体験できる食の祭典。",
            image_url: "/images/events/12.jpg",
            category: "グルメ",
            start_date: "2024-09-15",
            end_date: "2024-09-23",
            location: "京都市内各所",
            price: 1500
        },
        {
            id: 13,
            title: "大阪城3Dマッピング",
            description: "大阪城の壁面を使った壮大な3Dプロジェクションマッピング。",
            image_url: "/images/events/13.jpg",
            category: "イベント",
            start_date: "2024-12-01",
            end_date: "2024-12-25",
            location: "大阪城",
            price: 2000
        },
        {
            id: 14,
            title: "奈良大仏全国ライトアップフェスティバル",
            description: "東大寺の大仏様を幻想的にライトアップするイベント。",
            image_url: "/images/events/14.jpg",
            category: "イベント",
            start_date: "2024-10-01",
            end_date: "2024-10-31",
            location: "東大寺",
            price: 1000
        },
        {
            id: 15,
            title: "神戸ジャズストリート",
            description: "神戸の街角で繰り広げられる音楽の祭典。",
            image_url: "/images/events/15.jpg",
            category: "音楽",
            start_date: "2024-10-12",
            end_date: "2024-10-13",
            location: "神戸市中央区",
            price: 3000
        },
        {
            id: 16,
            title: "京都・嵐山花灯路",
            description: "嵐山一帯をLEDの光で彩るライトアップイベント。竹林の道や渡月橋が幻想的な雰囲気に。",
            image_url: "/images/events/16.jpg",
            category: "イルミネーション",
            start_date: "2024-12-08",
            end_date: "2024-12-17",
            location: "京都市嵐山一帯",
            price: 0
        },
        {
            id: 17,
            title: "大阪オクトーバーフェスト",
            description: "ドイツビールと料理を楽しむ野外フェスティバル。本場の雰囲気を大阪で体験できます。",
            image_url: "/images/events/17.jpg",
            category: "グルメ",
            start_date: "2024-09-20",
            end_date: "2024-10-02",
            location: "大阪城公園",
            price: 2500
        },
        {
            id: 18,
            title: "神戸イルミナージュ",
            description: "約100万球のLEDで彩られる光の王国。音楽とシンクロした幻想的な光の世界を体験できます。",
            image_url: "/images/events/18.jpg",
            category: "イルミネーション",
            start_date: "2024-11-01",
            end_date: "2024-12-25",
            location: "神戸市立須磨離宮公園",
            price: 1800
        },
        {
            id: 19,
            title: "奈良若草山焼き",
            description: "若草山の山焼き。古都奈良の冬の風物詩として知られる伝統行事。",
            image_url: "/images/events/19.jpg",
            category: "祭り",
            date: "2024-01-27",
            location: "奈良若草山",
            price: 0
        },
        {
            id: 20,
            title: "大阪光のルネサンス",
            description: "大阪市役所周辺を彩る光のアートフェスティバル。壮大な3Dマッピングも。",
            image_url: "/images/events/20.jpg",
            category: "イルミネーション",
            start_date: "2024-12-14",
            end_date: "2024-12-25",
            location: "大阪市中央公会堂周辺",
            price: 0
        },
        {
            id: 21,
            title: "京都・梅小路マルシェ",
            description: "京都の食材や雑貨が集まる定期市。地元グルメも楽しめます。",
            image_url: "/images/events/21.jpeg",
            category: "グルメ",
            start_date: "2024-04-01",
            end_date: "2024-04-03",
            location: "梅小路公園",
            price: 0
        }
    ];

    function refreshEvents() {
        const eventList = document.getElementById('event-list');

        // フィルタリングのロジックを削除し、すべてのイベントを表示
        eventList.innerHTML = '';
        events.forEach(event => {
            eventList.innerHTML += createEventCard(event);
        });
    }

    // 初期表示
    refreshEvents();
});

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
                                    style="border-radius: 30px;
                                           padding: 8px 20px;
                                           font-weight: 600;
                                           background-color: #1B4B8F !important;
                                           border: none;
                                           color: white !important;
                                           transition: all 0.3s ease;">
                                <i class="bi bi-cart-plus me-1" style="color: white !important;"></i> カートに追加
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
