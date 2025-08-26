@include('Items.dashboard')

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список товаров</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Заголовок -->
    <h1 class="text-center mb-5">
        <i class="bi bi-bag"></i> Список товаров
    </h1>

    <!-- Поиск -->
    <form action="{{ route('index') }}" method="get" class="row g-2 mb-5 justify-content-center">
        <div class="col-md-6">
            <input type="text" name="category" class="form-control rounded-pill shadow-sm"
                   placeholder="Билет, концерт, отель...">
        </div>
        <div class="col-md-auto">
            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-search"></i> Найти
            </button>
        </div>
    </form>

    <!-- Список товаров -->
    <div class="row g-4 mb-5">
        @foreach($items as $item)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary">
                            <i class="bi bi-box"></i> {{ $item->name }}
                        </h5>
                        <p class="card-text text-muted flex-grow-1">{{ $item->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-success fs-5">
                                <i class="bi bi-currency-dollar"></i> {{ $item->price }}
                            </span>
                            <a href="{{ route('show',$item->id) }}"
                               class="btn btn-outline-primary btn-sm rounded-pill">
                                Подробнее
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(session('success'))
        <div class="alert alert-danger rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Специальное предложение -->
    <div class="bg-white p-4 rounded-4 shadow-lg">
        <h2 class="mb-4 text-center text-danger">
            <i class="bi bi-stars"></i> Специальные предложения
        </h2>
        <div class="row g-4">
            @foreach($Koncerts as $koncert)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-purple">
                                <i class="bi bi-music-note-beamed"></i> {{ $koncert->name }}
                            </h5>
                            <p class="card-text text-muted flex-grow-1">{{ $koncert->description }}</p>
                            <ul class="list-unstyled small text-muted">
                                <li><i class="bi bi-people"></i> Мест: {{ $koncert->quantity }}</li>
                                <li><i class="bi bi-currency-dollar"></i> Цена: {{ $koncert->price }}</li>
                                <li><i class="bi bi-calendar-event"></i> Дата: {{ $koncert->date }}</li>
                            </ul>
                            <a href="{{route('ShowTicket', $koncert->id)}}" class="btn btn-danger mt-auto rounded-pill">
                                <i class="bi bi-ticket-perforated"></i> Подробнее
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>




</body>
</html>
