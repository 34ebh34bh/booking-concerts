<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $item->name }}</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 p-4" style="width: 28rem;">
    <!-- Назад -->
    <div class="mb-3">
        <a href="{{ route('index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
            <i class="bi bi-arrow-left"></i> Назад
        </a>
    </div>

    <!-- Данные товара -->
    <h3 class="mb-3 text-primary"><i class="bi bi-box"></i> {{ $item->name }}</h3>
    <p class="text-muted"><i class="bi bi-card-text"></i> {{ $item->description }}</p>
    <p class="fw-bold fs-5 text-success">
        <i class="bi bi-currency-dollar"></i> {{ $item->price }}
    </p>


</div>

</body>
</html>
