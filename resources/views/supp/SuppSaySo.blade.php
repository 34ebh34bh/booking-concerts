<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title text-primary">{{ $SupportForm->prichina }}</h5>
        <p class="card-text text-muted">{{ $SupportForm->description }}</p>

        <p class="card-text">
            <strong>Статус:</strong>
            @if($SupportForm->status === 'Успешно')
                <span class="badge bg-success">{{ $SupportForm->status }}</span>
            @elseif($SupportForm->status === 'Отклонено')
                <span class="badge bg-danger">{{ $SupportForm->status }}</span>
            @elseif($SupportForm->status === 'В рассмотрении')
                <span class="badge bg-warning text-dark">{{ $SupportForm->status }}</span>
            @else
                <span class="badge bg-secondary">{{ $SupportForm->status }}</span>
            @endif
        </p>
    </div>
</div>

<hr>

<div class="card shadow-sm">
    <div class="card-header bg-light">
        <strong>Переписка</strong>
    </div>
    <div class="card-body" style="max-height: 400px; overflow-y: auto;">
        @foreach($SupportForm->messages as $message)
            <div class="d-flex mb-3
                @if($message->user_id === auth()->id()) justify-content-end @else justify-content-start @endif">

                <div class="card
                    @if($message->user_id === auth()->id()) bg-primary text-white @else bg-light @endif"
                     style="max-width: 70%;">

                    <div class="card-body p-2">
                        <h6 class="card-subtitle mb-1 small">
                            {{ $message->user->name }}
                        </h6>
                        <p class="mb-1">{{ $message->description }}</p>
                        <small class="text-muted">
                            {{ $message->created_at->format('H:i d.m.Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card-footer">
        <form action="{{ route('SuppSayPost', $SupportForm->id) }}" method="post">
            @csrf
            <div class="input-group">
                <textarea name="description" class="form-control" rows="1" placeholder="Введите сообщение..."></textarea>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
</div>
