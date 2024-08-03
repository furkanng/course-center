document.addEventListener('DOMContentLoaded', function () {
    // Tüm alertleri seçin
    const alerts = document.querySelectorAll('.alert');

    if (alerts.length) {
        // 2 saniye sonra tüm alertleri gizle
        setTimeout(function () {
            alerts.forEach(alert => {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500); // Bootstrap'in fade out süresi
            });
        }, 2000); // 2 saniye bekleme süresi
    }
});
