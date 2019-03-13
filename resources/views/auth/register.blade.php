@extends('layouts.app')

@section('content')
{{-- Хлебные крошки --}}
<ul class="app-breadcrumb">
    <li class="app-breadcrumb-item">
        <a href="{{ route('index') }}">Главная</a>
    </li>
    <li class="app-breadcrumb-active">
        Регистрация
    </li>
</ul>

<div class="container" id="register-page">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail адресс') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback e" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-1 user-agree-input">
                                <input id="user-agreement" type="checkbox" class="" name="agreement" checked>
                            </div>
                            <label for="user-agreement" class="col-md-11 col-form-label user-agree-label">
                                Я принимаю
                                <a target="_blank" href="{{ route('rules') }}" class="app-link p-0">правила использования сайта</a>
                                и даю согласие на обработку своих
                                <a href="{{ route('personal-info') }}" target="_blank" class="app-link p-0">персональных данных</a>
                            </label>
                            @if ($errors->has('agreement'))
                                <div class="col-md-11 offset-1">
                                    <span class="error-text">Вы не приняли правила использования сайта</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="app-btn">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
