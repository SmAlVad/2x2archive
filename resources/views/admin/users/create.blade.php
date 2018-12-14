@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    {!! Form::open(array('route' => 'admin.user.store','method'=>'POST')) !!}

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
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    {!! Form::close() !!}
@endsection