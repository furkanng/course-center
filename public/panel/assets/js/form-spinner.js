document.addEventListener('DOMContentLoaded', function () {
    const inputFields = document.querySelectorAll('.form-update');
    const submitInputFields = document.querySelectorAll('.form-submit');

    inputFields.forEach(input => {
        input.addEventListener('change', function () {
            const form = this.closest('form');
            const spinner = document.getElementById('global-spinner');

            if (form) {
                // Spinner'ı göster
                spinner.style.display = 'inline-block';

                // Formu submit et
                form.submit();

                setTimeout(function () {
                    spinner.style.display = 'none';
                }, 5000);
            }
        });
    });

    submitInputFields.forEach(input => {
        input.addEventListener('submit', function () {
            const form = this.closest('form');
            const spinner = document.getElementById('global-spinner');

            if (form) {
                // Spinner'ı göster
                spinner.style.display = 'inline-block';

                // Formu submit et
                form.submit();

                setTimeout(function () {
                    spinner.style.display = 'none';
                }, 5000);
            }
        });
    });
});
