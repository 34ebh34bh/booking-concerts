<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Покупка билета — {{ $Koncert->name }}</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 40rem; background: linear-gradient(135deg, #6f42c1, #d63384);">
    <div class="card-body p-5">

        <!-- Заголовок -->
        <h2 class="fw-bold mb-4 text-center">
            <i class="bi bi-ticket-perforated"></i> Покупка билета
        </h2>

        <!-- Информация о концерте -->
        <div class="bg-light text-dark rounded-3 p-3 mb-4">
            <h5 class="fw-bold mb-1">{{ $Koncert->name }}</h5>
            <p class="mb-1"><i class="bi bi-card-text"></i> {{ $Koncert->description }}</p>
            <p class="mb-1"><i class="bi bi-calendar-event"></i> {{ $Koncert->date }}</p>
            <p class="mb-0"><i class="bi bi-currency-dollar"></i> <span class="fw-bold fs-5 text-success">{{ $Koncert->price }}</span> / билет</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger rounded-3">
                {{ session('error') }}
            </div>
        @endif

        <!-- Форма -->
        <form action="{{route('BuyTickeStore',$Koncert->id)}}" method="post" class="needs-validation" novalidate>
            @csrf

            <!-- Email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" required>
                <label for="email"><i class="bi bi-envelope"></i> Email</label>
                <div class="invalid-feedback">Введите корректный email</div>
            </div>

            <!-- Количество билетов -->
            <div class="form-floating mb-3">
                <input type="number" class="form-control rounded-3" id="quantity" name="quanity" min="1" placeholder="Количество" required>
                <label for="quantity"><i class="bi bi-123"></i> Количество билетов</label>
                <div class="invalid-feedback">Введите количество билетов</div>
            </div>

            <!-- Имя -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="first_name" name="first_name" placeholder="Имя" required>
                <label for="first_name"><i class="bi bi-person"></i> Имя</label>
                <div class="invalid-feedback">Введите имя</div>
            </div>

            <!-- Фамилия -->
            <div class="form-floating mb-4">
                <input type="text" class="form-control rounded-3" id="last_name" name="last_name" placeholder="Фамилия" required>
                <label for="last_name"><i class="bi bi-person-badge"></i> Фамилия</label>
                <div class="invalid-feedback">Введите фамилию</div>
            </div>

            <!-- Итог -->
            <div class="alert alert-info text-center rounded-3 mb-4">
                💳 После покупки билет придёт вам на почту
            </div>

            <!-- Кнопка -->
            <button type="submit" class="btn btn-light text-dark w-100 py-2 rounded-3 fw-bold shadow-sm">
                <i class="bi bi-cart-check"></i> Купить билет
            </button>
        </form>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Bootstrap валидация
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

</body>
</html>
