<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $Koncert->name }}</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 40rem; background: linear-gradient(135deg, #6f42c1, #d63384);">
    <div class="card-body p-5">
        <!-- Назад -->
        <a href="{{ route('index') }}" class="btn btn-sm btn-light mb-4 rounded-pill">
            <i class="bi bi-arrow-left"></i> Назад
        </a>

        <!-- Название концерта -->
        <h2 class="fw-bold mb-3">
            <i class="bi bi-music-note-beamed"></i> {{ $Koncert->name }}
        </h2>

        <!-- Описание -->
        <p class="mb-4 fs-5">{{ $Koncert->description }}</p>

        <!-- Детали -->
        <ul class="list-unstyled fs-6">
            <li class="mb-2"><i class="bi bi-people"></i> Количество мест: <span class="fw-bold">{{ $Koncert->quantity }}</span></li>
            <li class="mb-2"><i class="bi bi-currency-dollar"></i> Цена: <span class="fw-bold">{{ $Koncert->price }}</span></li>
            <li class="mb-2"><i class="bi bi-calendar-event"></i> Дата: <span class="fw-bold">{{ $Koncert->date }}</span></li>
        </ul>

        <!-- Кнопки -->
        <div class="d-flex gap-3 mt-4">
            <a href="{{route('BuyTicket', $Koncert->id)}}" class="btn btn-light text-dark flex-fill rounded-pill fw-bold shadow-sm">
                <i class="bi bi-ticket-perforated"></i> Купить билет
            </a>

            <a href="{{ route('index') }}" class="btn btn-outline-light flex-fill rounded-pill fw-bold">
                <i class="bi bi-house"></i> На главную
            </a>
        </div>
    </div>
</div>

</body>
</html>
