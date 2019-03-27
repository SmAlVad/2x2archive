@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.success')

    <h2>Закрузка обьявлений</h2>

    <form action="{{ route('admin-csfd-add') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <input type="file" name="csfds">
            <button class="btn btn-primary" type="submit">Загрузить</button>
        </div>
    </form>

    @isset($count)
        <div class="alert alert-primary" role="alert">
            Загружено:&nbsp;<?= $count ?>&nbsp;обьявлений
        </div>
    @endisset

@endsection
