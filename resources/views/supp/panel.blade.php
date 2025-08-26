<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .support-cards-container {
            display: flex;
            flex-wrap: wrap; /* Позволяет карточкам переноситься на новую строку */
            gap: 20px; /* Отступ между карточками */
            justify-content: center; /* Центрирует карточки */
            padding: 20px;
        }

        .support-card {
            background-color: #ffffff; /* Белый фон */
            border: 1px solid #e0e0e0; /* Легкая серая рамка */
            border-radius: 12px; /* Скругленные углы */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Мягкая тень */
            padding: 20px;
            width: 100%; /* Занимает всю ширину на мобильных */
            max-width: 350px; /* Максимальная ширина карточки */
            display: flex;
            flex-direction: column; /* Элементы внутри расположены вертикально */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .support-card:hover {
            transform: translateY(-5px); /* Эффект "подъема" при наведении */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem; /* Размер заголовка */
            color: #333333; /* Темный цвет текста */
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 1rem; /* Размер текста описания */
            color: #666666; /* Серый цвет текста */
            flex-grow: 1; /* Описание займет всё доступное пространство */
            margin-bottom: 15px;
        }

        .card-link {
            display: inline-block; /* Делаем ссылку блочным элементом */
            background-color: #007bff; /* Синий фон */
            color: #ffffff; /* Белый текст */
            padding: 10px 15px;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .card-link:hover {
            background-color: #0056b3; /* Более темный синий при наведении */
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="support-cards-container">
    @foreach($SupportForms as $SupportForm)
        <div class="support-card">
            <h3 class="card-title">{{ $SupportForm->prichina }}</h3>
            <p class="card-description">{{ $SupportForm->description }}</p>
            <a href="{{ route('SupportChange', $SupportForm->id) }}" class="card-link">Перейти к обращению</a>
        </div>
    @endforeach
</div>

</body>
</html>
