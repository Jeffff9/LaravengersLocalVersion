document.addEventListener('DOMContentLoaded', function() {
    // スクロールアニメーションの追加
    const timeBlocks = document.querySelectorAll('.time-block');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, {
        threshold: 0.1
    });

    timeBlocks.forEach(block => {
        observer.observe(block);
    });

    // アクティビティホバーエフェクト
    const activities = document.querySelectorAll('.activity');
    activities.forEach(activity => {
        activity.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });
        activity.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
