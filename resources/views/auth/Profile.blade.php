<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg border-0 rounded-4 p-4 text-center" style="width: 24rem;">
    <div class="mb-3">
        <i class="bi bi-person-circle" style="font-size: 4rem; color: #0d6efd;"></i>
    </div>
    <h4 class="mb-2">{{ $user->name }}</h4>
    <p class="text-muted mb-4">
        <i class="bi bi-envelope"></i> {{ $user->email }}
    </p>

    <div class="d-grid gap-2">
        <a href="#" class="btn btn-outline-primary rounded-pill">
            <i class="bi bi-pencil"></i> Редактировать
        </a>
        <a href="#" class="btn btn-outline-danger rounded-pill">
            <i class="bi bi-box-arrow-right"></i> Выйти
        </a>
    </div>
</div>

</body>
</html>
