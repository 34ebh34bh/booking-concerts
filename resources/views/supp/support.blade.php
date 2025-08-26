
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать тикет поддержки</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .button-container {
            display: flex; /* Используем flexbox для центрирования */
            justify-content: center; /* Центрируем по горизонтали */
            align-items: center; /* Центрируем по вертикали */
            padding: 20px; /* Отступ вокруг кнопки */
        }

        .blue-button {
            text-decoration: none; /* Убираем подчеркивание у ссылки */
            font-family: Arial, sans-serif; /* Выбираем шрифт */
            font-size: 16px; /* Размер шрифта */
            font-weight: bold; /* Жирный текст */
            color: #ffffff; /* Цвет текста — белый */
            background-color: #007bff; /* Основной синий цвет */
            border: none; /* Убираем рамку */
            border-radius: 8px; /* Скругление углов */
            padding: 12px 24px; /* Внутренние отступы (высота и ширина) */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Легкая тень */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Плавный переход для hover */
        }

        .blue-button:hover {
            background-color: #0056b3; /* Цвет при наведении */
            transform: translateY(-2px); /* Эффект "подъема" кнопки */
        }

        .blue-button:active {
            transform: translateY(0); /* Эффект "нажатия" */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light">

<div class="button-container">
    <a href="{{route('MyssupportTickets')}}" class="blue-button">Мои жалобы</a>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-life-preserver"></i> Создать тикет</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{route('SupportStore')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-exclamation-circle"></i> Причина</label>
                            <input type="text" name="prichina" class="form-control rounded-3" placeholder="Например: Проблема с оплатой" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-chat-text"></i> Описание</label>
                            <textarea name="description" rows="5" class="form-control rounded-3" placeholder="Опишите вашу проблему подробнее..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm">
                            <i class="bi bi-send"></i> Отправить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
