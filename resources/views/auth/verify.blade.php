@extends('layouts.app')

@section('content')
  {{-- Хлебные крошки --}}
  <ul class="app-breadcrumb">
    <li class="app-breadcrumb-item">
      <a href="{{ route('index') }}">Главная</a>
    </li>
    <li class="app-breadcrumb-active">
      Подтвердите адрес электронной почты
    </li>
  </ul>

  <div class="container" id="verify-page">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                Новое сообщение для подтверждения электронной почты было выслано
              </div>
            @endif

            <p>Для продолжения работы, необходимо подтвердить адрес электронной почты.</p>
            <p>
              Если вы не получали письмо для подтвеждения, <a href="{{ route('verification.resend') }}">нажмите
                здесь</a> для повторной отправки сообщения.
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
