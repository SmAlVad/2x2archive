@extends('layouts.app')

@section('content')
    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-item">
            <a href="{{ route('paper-index') }}">Читать газету</a>
        </li>
        <li class="app-breadcrumb-active">
            Просмотр
        </li>
    </ul>

    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-xl-12">
                <iframe src="/storage/pdf/{{ $pdf->file_name }}" width="100%" height="800">
                    Ваш браузер не поддерживает плавающие фреймы!
                </iframe>
            </div>
        </div>
    </div>
@endsection
