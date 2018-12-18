@extends('admin.layouts.app_admin')

@section('content')

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <span>{{ $message }}</span>
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <h2>Форма для добавления обьявлений</h2>

    <form action="{{ route('admin-csfd-add') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <input type="file" name="json">
            <button class="btn btn-primary" type="submit">Загрузить</button>
        </div>
    </form>

    @isset($count)
        <div class="alert alert-primary" role="alert">
            Загружено:&nbsp;<?= $count ?>&nbsp;обьявлений
        </div>
    @endisset

@endsection