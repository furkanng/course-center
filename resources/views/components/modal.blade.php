<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-modal .modal-confirm {
            color: #434e65;
            width: 525px;
        }

        .custom-modal .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .custom-modal .modal-confirm .modal-header {
            background: #47c9a2;
            border-bottom: none;
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }

        .custom-modal .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }

        .custom-modal .modal-confirm .form-control, .custom-modal .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .custom-modal .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
        }

        .custom-modal .modal-confirm .close:hover {
            opacity: 0.8;
        }

        .custom-modal .modal-confirm .icon-box {
            color: #fff;
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }

        .custom-modal .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }

        .custom-modal .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .custom-modal .modal-confirm .btn, .custom-modal .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #eeb711 !important;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }

        .custom-modal .modal-confirm .btn:hover, .custom-modal .modal-confirm .btn:focus {
            background: #eda645 !important;
            outline: none;
        }

        .custom-modal .btn span {
            margin: 1px 3px 0;
            float: left;
        }

        .custom-modal .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Modal -->
    <div class="modal fade custom-modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class='bx bx-check'></i>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <h4>Harika!</h4>
                    <p>{{ session('message') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to show modal and auto-hide it after 1 second -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if ('{{ session('message') }}') {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                    keyboard: false
                });
                myModal.show();

                setTimeout(function () {
                    myModal.hide();
                }, 1000); // (1 saniye)
            }
        });
    </script>
</div>
</body>
</html>
