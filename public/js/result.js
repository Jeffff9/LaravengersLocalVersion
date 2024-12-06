//xai apikey: xai-SYKxAQzMo26Eb1bk0joxnUPnrMmSUtmkWIvMi3KqhHEP24S3UsqEhKghYrlmTJNQPotIOxP1k8yrYbPA

document.addEventListener('DOMContentLoaded', function () {
    const result = document.getElementById('result');

    async function getAIResponse() {
        const question = localStorage.getItem('question');

        if (!question) {
            result.textContent = '質問が見つかりませんでした。';
            return;
        }

        try {
            const response = await fetch('https://api.openai.com/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': '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'
                },
                body: JSON.stringify({
                    model: "gpt-4o-mini",
                    messages: [{ role: "user", content: JSON.stringify(question) }],
                    temperature: 1,
                    max_tokens: 2000,
                    top_p: 1,
                    frequency_penalty: 0,
                    presence_penalty: 0,
                }),
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            if (data.choices && data.choices.length > 0) {
                const message = data.choices[0].message.content;
                const paragraph = document.createElement('p');
                paragraph.textContent = message;
                result.appendChild(paragraph);
                console.log(message);
            } else {
                result.textContent = '回答が得られませんでした。';
            }
        } catch (error) {
            console.error('エラーが発生しました:', error);
            result.textContent = '回答の取得に失敗しました。後ほど再度お試しください。';
        }
    }
    getAIResponse();
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
