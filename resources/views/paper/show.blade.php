@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-xl-12">
                <iframe src="/storage/pdf/{{ $pdf->file_name }}" width="100%" height="800">
                    Ваш браузер не поддерживает плавающие фреймы!
                </iframe>
            </div>
        </div>
    </div>
@endsection
