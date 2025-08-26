<div class="container mt-4">
    <h2 class="mb-4">📝 История заказов</h2>

    @forelse($orders as $order)
        <div class="card shadow-sm mb-3">
            <div class="row g-0">
                {{-- Фото концерта --}}
                <div class="col-md-3">
                    @if($order->koncert && $order->koncert->image)
                        <img src="{{ $order->koncert->image }}" class="img-fluid rounded-start" alt="{{ $order->koncert->name }}">
                    @else
                        <img src="/images/no_image.png" class="img-fluid rounded-start" alt="Нет фото">
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $order->koncert->name }}</h5>
                        <p class="card-text text-muted">{{ $order->koncert->description }}</p>
                        <p class="card-text">
                            <strong>Дата:</strong> {{ $order->koncert->date}}
                        </p>
                        <p class="card-text">
                            <strong>Количество:</strong> {{ $order->koncert->quantity }}
                        </p>
                        <p class="card-text fw-bold">
                            Цена: {{ number_format($order->koncert->price * $order->koncert->quantity, 0, ',', ' ') }} ₽
                        </p>
                    </div>
                </div>

                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <span class="badge bg-success p-2">✅ Оплачен</span>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">История заказов пуста.</p>
    @endforelse
</div>
