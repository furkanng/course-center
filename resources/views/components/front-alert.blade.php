<div id="front-alert" class="alert alert-{{ $type }}" role="alert">
    <strong>{{ $message }} !</strong>
</div>

<style>
    #front-alert {
        position: fixed;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 501;
        padding: 15px 30px;
        min-width: 200px;
        max-width: 80%;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alerts = document.querySelectorAll('.alert');

        if (alerts.length) {
            setTimeout(function () {
                alerts.forEach(alert => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 500);
                });
            }, 2000);
        }
    });

</script>
