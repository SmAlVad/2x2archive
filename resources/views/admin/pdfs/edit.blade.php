@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')
    <h3>Изменение PDF</h3>

    {!! Form::open(['route' => ['admin.pdf.update', $pdf->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="input-group" style="display: block;">
        <div class="alert alert-primary" role="alert">
            Если фаил не выбран то остается старый
        </div>
        <div class="custom-file">
            {!! Form::file('file') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('project_id', 'Проект') !!}
        <select name="project_id" id="project_id" class="custom-select">
            @foreach ($projects as $key => $value)
                <option value="{{ $key }}"
                        @if ($key == $pdf->project_id)
                        selected
                        @endif
                >{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="start-date">Дата:</label>
        <input type="date" id="start-date" name="date" value="{{ $date }}" min="2014-01-01" max="2020-12-31">
    </div>

    <div class="form-group">
        {!! Form::label('number', 'Номер издания') !!}
        {!! Form::text('number', $pdf->number, ['class' => 'form-control']); !!}
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']); !!}
    {!! Form::close() !!}
@endsection