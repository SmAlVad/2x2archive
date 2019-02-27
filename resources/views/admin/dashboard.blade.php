@extends('admin.layouts.app_admin')

@section('content')

    <div class="admin">
        <h1>Админка</h1>
    </div>
    <div class="">
        Обьявлений в архиве:&nbsp;<span class="badge badge-info" style="font-size: 1.2rem;">{{ $advert }}</span>
    </div>
    <div class="">
        Пользователей:&nbsp;<span class="badge badge-info" style="font-size: 1.2rem;">{{ $users }}</span>
    </div>

@endsection