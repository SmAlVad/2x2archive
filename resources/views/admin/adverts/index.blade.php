@extends('admin.layouts.app_admin')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Регион</th>
                <th>Город</th>
                <th>Кат-я 1</th>
                <th>Кат-я 2</th>
                <th>Кат-я 3</th>
                <th>Заголовок</th>
                <th>Тело</th>
                <th>Тэги</th>
                <th>Цена</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Имя</th>
                <th>Дата подачи</th>
                <th>Дата окончания</th>
                <th>Параметры</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adverts as $advert)
                <tr>
                    <td>{{ $advert->csfd_id }}</td>
                    <td>{{ $advert->region }}</td>
                    <td>{{ $advert->city }}</td>
                    <td>{{ $advert->cat1 }}</td>
                    <td>{{ $advert->cat2 }}</td>
                    <td>{{ ($advert->cat3) ?: '-' }}</td>
                    <td>{{ $advert->title }}</td>
                    <td>{{ str_limit($advert->body, 100) }}</td>
                    <td>{{ ($advert->tags) ?: '-' }}</td>
                    <td>{{ $advert->price }}</td>
                    <td>{{ $advert->tel }}</td>
                    <td>{{ $advert->email }}</td>
                    <td>{{ $advert->name }}</td>
                    <td>{{ $advert->date_start }}</td>
                    <td>{{ $advert->date_end }}</td>
                    <td>{{ ($advert->params) ?: '-' }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="16">
                    <ul class="pagination float-left">
                        {{$adverts->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection