@component('mail::message')

    # Загрузка обьявлений от {{ $log->created_at }}

    Количество: {{ $log->count }}

@endcomponent
