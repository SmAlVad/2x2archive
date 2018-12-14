@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    {!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
    <div class="form-group">
        <strong>Название:</strong>
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Возможные действия:</strong>
        <br/>
        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Редактировать</button>
    {!! Form::close() !!}

@endsection