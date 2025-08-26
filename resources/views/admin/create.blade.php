<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать товар</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Иконки Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 p-4" style="width: 30rem;">
    <h3 class="text-center mb-4"><i class="bi bi-box-seam"></i> Создать товар</h3>

    <form action="{{ route('create') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Название" required>
            <label for="name"><i class="bi bi-tag"></i> Название</label>
            <div class="invalid-feedback">Введите название товара</div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="description" name="description" placeholder="Описание" required>
            <label for="description"><i class="bi bi-card-text"></i> Описание</label>
            <div class="invalid-feedback">Введите описание</div>
        </div>

        <div class="form-floating mb-4">
            <input type="number" step="0.01" class="form-control rounded-3" id="price" name="price" placeholder="Цена" required>
            <label for="price"><i class="bi bi-currency-dollar"></i> Цена</label>
            <div class="invalid-feedback">Укажите цену</div>
        </div>

        <select name="category" id="">
            @foreach($categorys as $category)
            <option name="category" value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm">
            <i class="bi bi-plus-circle"></i> Создать
        </button>
    </form>
</div>

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
