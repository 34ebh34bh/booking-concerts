@foreach($SupportForm as $SupportFor)
<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title text-primary">Причина: {{ $SupportFor->prichina }}</h5>
        <p class="card-text">
            <strong>Описание:</strong> {{ $SupportFor->description }}
        </p>
        @php
            $status = trim(mb_strtolower($SupportFor->status));
        @endphp
        <p class="card-text">
            <strong>Статус:</strong>
            @if($status === 'успешно')
                <span class="badge bg-success">Успешно</span>
            @elseif($status === 'отклонено')
                <span class="badge bg-danger">Отклонено</span>
            @elseif($status === 'в рассмотрении')
                <span class="badge bg-warning text-dark">В рассмотрении</span>
            @else
                <span class="badge bg-secondary">{{ $SupportFor->status }}</span>
            @endif
        </p>
    </div>
</div>
        <a href="{{route('SupportSayUserForm',$SupportFor->id)}}">Подробнее</a>
@endforeach
