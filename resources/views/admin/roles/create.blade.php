@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}

    <div class="form-group">
        <strong>Название:</strong>
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Permission:</strong>
        <br/>

        @foreach($permission as $value)

            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}

                {{ $value->name }}</label>

            <br/>

        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
    {!! Form::close() !!}

@endsection