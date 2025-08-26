<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .support-form-container {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
            background-color: #f4f7f9;
        }

        .support-form {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        .form-title {
            font-size: 1.8rem;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-field-info {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .form-field-info:last-of-type {
            border-bottom: none;
            padding-bottom: 0;
        }

        .label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .value {
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        .value-status {
            color: #007bff; /* Синий цвет для статуса */
            font-weight: bold;
            margin: 0;
        }

        .select-label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
        }

        .status-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            -webkit-appearance: none; /* Убирает стандартный стиль */
            -moz-appearance: none;
            appearance: none;
            background: url("data:image/svg+xml;utf8,<svg fill='%23555' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>") no-repeat right 10px center;
            background-size: 20px;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .submit-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="support-form-container">
    <form action="{{ route('SupportChangeStore', $SupportForm->id) }}" method="POST" class="support-form">
        @csrf

        <div class="form-section">
            <h2 class="form-title">Обращение в поддержку</h2>
            <div class="form-field-info">
                <span class="label">Причина:</span>
                <p class="value">{{ $SupportForm->prichina }}</p>
            </div>

            <div class="form-field-info">
                <span class="label">Описание:</span>
                <p class="value">{{ $SupportForm->description }}</p>
            </div>

            <div class="form-field-info">
                <span class="label">Текущий статус:</span>
                <p class="value-status">{{ $SupportForm->status }}</p>
            </div>
        </div>

        <div class="form-section">
            <label for="status-select" class="select-label">Изменить статус:</label>
            <select name="status" id="status-select" class="status-select">
                @foreach($Status as $statu)
                    <option value="{{ $statu->status_name }}"
                            @if($SupportForm->status === $statu->status_name) selected @endif>
                        {{ $statu->status_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="submit-button">Сохранить изменения</button>
    </form>

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

</div>
</body>
</html>
