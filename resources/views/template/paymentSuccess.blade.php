<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Faturası</title>
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

        .content h6 {
            margin: 0 0 5px;
            color: #333333;
        }

        .content p {
            margin: 0 0 10px;
            color: #666666;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #e5e5e5;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        .table th {
            background-color: #f4f4f4;
            color: #333333;
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

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-danger {
            background-color: #dc3545;
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
        <h6>{{json_decode($order['shipping_address'],true)['name']}}</h6>
        <p>{{json_decode($order['shipping_address'],true)['address']}}<br>
            {{json_decode($order['shipping_address'],true)['city']}}<br>
            {{json_decode($order['shipping_address'],true)['district']}}</p>

        <h6>Sipariş Numarası:</h6>
        <p>{{$order['code']}}</p>

        <h6>Sipariş Tarihi:</h6>
        <p>{{ $order['created_at']->format('d.m.Y') }}</p>

        <table class="table">
            <thead>
            <tr>
                <th>Reklam Adı</th>
                <th>Reklam Adedi</th>
                <th>Fiyat</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$order->plan->name ?? 'Misafir Kayıt'}}</td>
                <td>{{$order->piece}}</td>
                <td>{{$order->price}} ₺</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">Toplam</td>
                <td>{{$order->price}} ₺</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="footer">
        <h5>{{$language['text_18']}}</h5>
        <p>{{$language['text_19']}}</p>
        <p>Email: <span>{{$settings['contact_email']}}</span></p>
    </div>
</div>
</body>
</html>
