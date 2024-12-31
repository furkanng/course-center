<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Hatası</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header h6, .header p {
            margin: 0;
            color: #666666;
        }

        .content {
            padding: 20px;
        }

        .content h5 {
            margin: 0 0 10px;
            color: #333333;
        }

        .content p {
            margin: 0 0 10px;
            color: #666666;
            font-size: 14px;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: left;
            font-size: 14px;
            color: #666666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: #ffffff;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{$image['logo']}}" alt="Logo">
        <h6>{{$settings['contact_address']}}</h6>
        <p>Tel: {{$settings['contact_phone']}}</p>
    </div>
    <div class="content">
        <h5>Ödeme Hatası</h5>
        <p>Merhaba,</p>
        <p>Ödemeniz sırasında bir hata meydana geldi. Lütfen aşağıdaki hata mesajını kontrol edin:</p>
        <p style="color: #dc3545; font-weight: bold;">{{$data["failed_reason_msg"]}}</p>
        <p>Lütfen tekrar denemeden önce ödeme bilgilerinizi kontrol edin veya bizimle iletişime geçin.</p>
    </div>
    <div class="footer">
        <p>E-posta: <span>{{$settings['contact_email']}}</span></p>
    </div>
</div>
</body>
</html>
