<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать концерт</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 p-4 text-white" style="width: 32rem; background: linear-gradient(135deg, #6f42c1, #d63384);">
    <h3 class="text-center mb-4"><i class="bi bi-music-note-beamed"></i> Создание концерта</h3>

    <form action="{{ route('koncstore') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Название концерта -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Название концерта" required>
            <label for="name"><i class="bi bi-music-note"></i> Название концерта</label>
            <div class="invalid-feedback">Введите название концерта</div>
        </div>

        <!-- Описание -->
        <div class="form-floating mb-3">
            <textarea class="form-control rounded-3" id="description" name="description" placeholder="Описание" style="height: 100px" required></textarea>
            <label for="description"><i class="bi bi-card-text"></i> Описание</label>
            <div class="invalid-feedback">Введите описание</div>
        </div>

        <!-- Количество билетов -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control rounded-3" id="quantity" name="quantity" placeholder="Количество билетов" required>
            <label for="quantity"><i class="bi bi-people"></i> Количество билетов</label>
            <div class="invalid-feedback">Введите количество билетов</div>
        </div>

        <!-- Цена -->
        <div class="form-floating mb-4">
            <input type="number" step="0.01" class="form-control rounded-3" id="price" name="price" placeholder="Цена билета" required>
            <label for="price"><i class="bi bi-currency-dollar"></i> Цена билета</label>
            <div class="invalid-feedback">Введите цену билета</div>
        </div>

        <div class="form-floating mb-4">
            <input type="date" step="0.01" class="form-control rounded-3" id="date" name="date" placeholder="Цена билета" required>
            <label for="price"><i class="bi bi-currency-dollar"></i> Дата концерта</label>
            <div class="invalid-feedback">Введите дату концерта</div>
        </div>

        <!-- Кнопка -->
        <button type="submit" class="btn btn-light w-100 py-2 rounded-3 shadow-sm fw-bold">
            <i class="bi bi-check-circle"></i> Создать концерт
        </button>
    </form>
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
