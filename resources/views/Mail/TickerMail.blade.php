<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш билет на концерт 🎫</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f7;
            color: #333;
            padding: 20px;
        }
        .ticket-card {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .ticket-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #6f42c1;
            margin-bottom: 20px;
        }
        .ticket-body {
            font-size: 16px;
            line-height: 1.5;
        }
        .ticket-info {
            background: #f0f0ff;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
        .ticket-info p {
            margin: 8px 0;
        }
        .button {
            display: inline-block;
            background: #6f42c1;
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 15px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="ticket-card">
    <div class="ticket-header">🎫 Ваш билет на концерт</div>

    <div class="ticket-body">
        <p>Здравствуйте, <strong>{{ $order->first_name }} {{ $order->last_name }}</strong>!</p>
        <p>Вы успешно приобрели билет(ы) на концерт:</p>

        <div class="ticket-info">
            <p><strong>Концерт:</strong> {{ $order->koncert->name }}</p>
            <p><strong>Дата:</strong> {{ $order->koncert->date }}</p>
            <p><strong>Количество билетов:</strong> {{ $order->quanity }}</p>
        </div>

        <p>
            <a href="{{ route('show', $order->koncert->id) }}" class="button">Посмотреть концерт</a>
        </p>

        <p>Спасибо, что выбрали нас!<br>
            Надеемся, концерт принесёт вам массу впечатлений 🎶</p>
    </div>

    <div class="footer">
        С уважением, <br>
        <strong>Команда Concerts</strong>
    </div>
</div>
</body>
</html>
