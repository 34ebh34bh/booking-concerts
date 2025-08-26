<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-5"><i class="bi bi-basket"></i> Список товаров</h1>

    <div class="row g-4">
        @foreach($items as $item)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">{{ $item->name }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ $item->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-success fs-5">
                                <i class="bi bi-currency-dollar"></i> {{ $item->price }}
                            </span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-between">
                        <a href="{{ route('editall', $item->id) }}" class="btn btn-sm btn-outline-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Редактировать
                        </a>
                        <form action="{{ route('delete', $item->id) }}" method="POST" onsubmit="return confirm('Удалить товар?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                                <i class="bi bi-trash"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
