<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 p-4" style="width: 26rem;">
    <h3 class="text-center mb-4"><i class="bi bi-box-arrow-in-right"></i> Вход</h3>

    <form action="{{ route('LoginStore') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Email -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" required>
            <label for="email"><i class="bi bi-envelope"></i> Email</label>
            <div class="invalid-feedback">Введите корректный email</div>
        </div>

        <!-- Пароль -->
        <div class="form-floating mb-4">
            <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Пароль" required>
            <label for="password"><i class="bi bi-lock"></i> Пароль</label>
            <div class="invalid-feedback">Введите пароль</div>
        </div>

        <!-- Кнопка -->
        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm">
            <i class="bi bi-box-arrow-in-right"></i> Войти
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ url('register') }}" class="text-decoration-none">
            Нет аккаунта? <strong>Зарегистрироваться</strong>
        </a>
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
