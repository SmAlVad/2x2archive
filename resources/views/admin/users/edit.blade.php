@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.user.update', $user->id]]) !!}

    <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Email:</strong>
        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Password:</strong>
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Confirm Password:</strong>
        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Role:</strong>
        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
    </div>

    <button type="submit" class="btn btn-primary float-right">Редактировать</button>

    {!! Form::close() !!}
@endsection