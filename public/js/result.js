document.addEventListener('DOMContentLoaded', () => {
    const resultcontent = document.querySelector('.result-content');

    const question = localStorage.getItem('question');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            messages: [{ role: 'user', content: question }],
            model: 'llama-3.1-sonar-large-128k-online'
        })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.choices && data.choices[0] && data.choices[0].message.content) {
                resultcontent.textContent = data.choices[0].message.content;
            } else {
                resultcontent.textContent = 'No valid response from API.';
            }
        })
        .catch(err => {
            console.error(err);
            ai.textContent = 'An error occurred. Please check the console for details.';
        });
});


function savePlan() {
    const planContent = document.querySelector('.result-content').innerText;
    const date = document.querySelector('.result-date').innerText;

    const plan = {
        content: planContent,
        date: date,
        created_at: new Date().toISOString()
    };

    // ローカルストレージに保存
    let savedPlans = JSON.parse(localStorage.getItem('savedPlans') || '[]');
    savedPlans.push(plan);
    localStorage.setItem('savedPlans', JSON.stringify(savedPlans));

    alert('プランを保存しました！');
}

function sharePlan() {
    const text = document.querySelector('.result-content').innerText;
    const encodedText = encodeURIComponent(`【観光プラン】\n\n${text}`);

    // シェアメニューを表示
    if (navigator.share) {
        navigator.share({
            title: '観光プラン',
            text: text
        }).catch(console.error);
    } else {
        // LINE共有にフォールバック
        window.open('https://line.me/R/msg/text/?' + encodedText, '_blank');
    }
}
