<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg rounded-4 p-4 text-center" style="width: 22rem;">
    <h1 class="h4 mb-4">Админка</h1>
    <div class="d-grid gap-3">
        <a href="{{route('editpage')}}" class="btn btn-danger text-white">
            Редактировать/Удалить
        </a>
        <a href="{{route('konc')}}" class="btn btn-danger text-white">
            Создать концерт
        </a>
        <a href="{{route('createpage')}}" class="btn btn-primary">
            Создать
        </a>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
