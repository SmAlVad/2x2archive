@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')
    <h3>Добавление PDF</h3>

    {!! Form::open(['route' => 'admin.pdf.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('project_id', 'Проект') !!}
        {!! Form::select('project_id', $projects, null, ['class' => 'custom-select']); !!}
    </div>

    <div class="form-group">
        <label for="start-date">Дата:</label>
        <input type="date" id="start-date" name="date" min="2014-01-01" max="{{ date('Y-m-d') }}" required>
    </div>


    <div class="form-group">
        {!! Form::label('number', 'Номер издания') !!}
        {!! Form::text('number', null, ['class' => 'form-control']); !!}
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']); !!}
    {!! Form::close() !!}
@endsection