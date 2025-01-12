document.addEventListener('DOMContentLoaded', () => {
    const ai = document.getElementById('ai');

    // Laravel 的 CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Fetch 請求
    fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            messages: [{ role: 'user', content: 'are you perplexity?' }],
            model: 'llama-3.1-sonar-small-128k-online'
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
                ai.textContent = data.choices[0].message.content;
            } else {
                ai.textContent = 'No valid response from API.';
            }
        })
        .catch(err => {
            console.error(err);
            ai.textContent = 'An error occurred. Please check the console for details.';
        });
});
