@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4">
                @isset($pdfs)
                    <div class="search-paper-result">
                        <h3>Результаты:</h3>
                        <ul>
                            @forelse($pdfs as $pdf)
                                <li><i class="fas fa-file"></i>&nbsp;
                                    <a href="{{ route('paper-show', $pdf->id) }}" target="_blank">
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
            <div class="col-xl-8">
                <form action="{{ route('paper-search') }}" method="GET">
                    <div class="search-paper-year">
                        <div class="paper-year-title">
                            <h4>Год</h4>
                        </div>
                        <div class="paper-year-radio">
                            @foreach(\App\Models\Pdf::getReleaseYear() as $k => $v)
                                <input type="radio" name="year" id="year-radio-{{$k}}"
                                       value="{{ $v }}" {{ ($k == $year) ? 'checked' : '' }}>
                                <label for="year-radio-{{ $k }}">{{ $v }}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="search-paper-month">
                        <div class="paper-month-title">
                            <h4>Месяц</h4>
                        </div>
                        <div class="paper-month-radio">
                            @foreach(\App\Models\Pdf::getReleaseMonth() as $k => $v)
                                <input type="radio" name="month" id="month-radio-{{ $k }}"
                                       value="{{ $k }}" {{ ($k == $month) ? 'checked' : '' }}>
                                <label for="month-radio-{{ $k }}">{{ $v }}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="search-paper-name">
                        <div class="paper-name-title">
                            <h4>Издание</h4>
                        </div>
                        <div class="paper-name-radio">
                            @foreach(\App\Models\Project::pluck('name', 'id')->all() as $k => $v)
                                <input type="radio" name="project" id="project-radio-{{ $k }}"
                                       value="{{ $k }}" {{ ($k == $project_id) ? 'checked' : '' }}>
                                <label for="project-radio-{{ $k }}">{{ $v }}</label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="search-paper-btn">Показать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
