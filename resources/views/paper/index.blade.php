@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('paper-search') }}" method="GET">
                    <div class="form-group">
                        <h4>Год</h4>
                        @foreach(\App\Models\Pdf::getReleaseYear() as $k => $v)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="year" id="year-radio-{{$k}}"
                                       value="{{ $v }}" {{ ($k == $year) ? 'checked' : '' }}>
                                <label class="form-check-label" for="year-radio-{{ $k }}">{{ $v }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <h4>Месяц</h4>
                        @foreach(\App\Models\Pdf::getReleaseMonth() as $k => $v)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="month" id="month-radio-{{ $k }}"
                                       value="{{ $k }}" {{ ($k == $month) ? 'checked' : '' }}>
                                <label class="form-check-label" for="month-radio-{{ $k }}">{{ $v }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <h4>Издание</h4>
                        @foreach(\App\Models\Project::pluck('name', 'id')->all() as $k => $v)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="project" id="project-radio-{{ $k }}"
                                       value="{{ $k }}" {{ ($k == $project_id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="project-radio-{{ $k }}">{{ $v }}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Показать</button>
                </form>
            </div>

            @isset($pdfs)
                <div class="col-xl-12 mt-3">
                    <h3>Результаты:</h3>
                    <ul>
                        @forelse($pdfs as $pdf)
                            <li><a href="{{ route('paper-show', $pdf->id) }}">
                                    Издание {{ $pdf->project->name }} |
                                    год {{ $pdf->year }} |
                                    месяц {{ $pdf->month }} |
                                    день {{ $pdf->day }} |
                                    номер {{ $pdf->number }}
                                </a>
                            </li>
                        @empty
                            <li>Ничего не найдено&nbsp;<i class="far fa-frown"></i></li>
                        @endforelse
                    </ul>
                </div>
            @endisset
        </div>
    </div>
@endsection
