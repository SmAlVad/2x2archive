@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Создание ключа @endslot
        @slot('parent') Главная @endslot
        @slot('active') Ключи @endslot
    @endcomponent

    @include('admin.rates.partials.errors')

    <form action="{{route('admin.key.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="input-rate">Тариф</label>
            <select id="input-rate" class="form-control" name="rate_id">
                @foreach($rates as $rate)
                    <option value="{{ $rate->id }}">{{ $rate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="input-user">Кому</label>
            <select id="input-user" class="form-control" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection