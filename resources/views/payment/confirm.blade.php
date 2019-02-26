@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-xl-12">
                <h2>Тут что обьяснение</h2>
                <p>После нажатия кнопки, ла ла ла</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, quisquam.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, quisquam.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, quisquam.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, quisquam.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, quisquam.
                </p>
            </div>
            <div class="col-xl-12 text-center">
                {!! Form::open(['url' => $url, 'method' => 'POST']) !!}

                @foreach($params as $name => $value)
                    {!! Form::hidden($name, $value); !!}
                @endforeach

                {!! Form::submit('Оплатить', ['class' => 'app-btn w-50 mt-4']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection