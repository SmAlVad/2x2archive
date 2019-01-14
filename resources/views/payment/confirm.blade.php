@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <h3>Робокасса</h3>
            </div>
            <div class="col-xl-6">
                {!! Form::open(['url' => $url, 'method' => 'POST']) !!}

                @foreach($params as $name => $value)
                    {!! Form::hidden($name, $value); !!}
                @endforeach

                {!! Form::submit('Оплатить', ['class' => 'btn btn-lg btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection