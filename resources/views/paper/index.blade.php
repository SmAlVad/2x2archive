@extends('layouts.app')

@section('content')
    <form action="{{ route('paper-search') }}" method="GET">
        <div class="container-fluid">
            <div class="row paper-search">

                <div class="col-lg-2 col-xl-2">
                    <div class="paper-search-select">
                        <label for="year">Год</label>
                        <select class="" id="year" name="year">
                            @foreach(\App\Models\Pdf::getReleaseYear() as $release_year)
                                <option value="{{ $release_year }}" {{ ($release_year == $year) ? 'selected' : '' }}>
                                    {{ $release_year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 col-xl-2">
                    <div class="paper-search-select">
                        <label for="month">Месяц</label>
                        <select class="" id="month" name="month">
                            @foreach(\App\Models\Pdf::getReleaseMonth() as $k => $v)
                                <option value="{{ $k }}" {{ ($k == $month) ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-2">
                    <div class="paper-search-select">
                        <label for="project">Издание</label>
                        <select class="" id="project" name="project">
                            @foreach(\App\Models\Project::pluck('name', 'id')->all() as $k => $v)
                                <option value="{{ $k }}" {{ ($k == $project_id) ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-xl-2 text-center">
                    <button type="submit" class="search-paper-submit-btn">Показать</button>
                </div>

            </div>
        </div>
    </form>

    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-active">
            Читать газету
        </li>
    </ul>

    <div class="container-fluid search-paper-result">
        @isset($pdfs)
            <div class="row">
                <div class="col-xl-12">
                    <h3>Результаты:</h3>
                </div>
            </div>

            <div class="row">
                @forelse($pdfs as $pdf)
                    <div class="col-sm-3 col-md-2 col-lg-2 col-xl-1">
                        <a href="{{ route('paper-show', $pdf->id) }}" target="_blank" class="result-pdf">
                            <ul>
                                <li class="pdf-number">№&nbsp;{{ $pdf->number }}</li>
                                <li>{{ $pdf->year }}&nbsp;год</li>
                                <li>{{ \App\Models\Pdf::getStringMonth($pdf->month ) }},&nbsp;{{ $pdf->day }}</li>
                                <li class="pdf-project">{{ $pdf->project->name }}</li>
                            </ul>
                        </a>
                    </div>
                @empty
                    <div class="col-xl-12">
                        Ничего не найдено&nbsp;<i class="far fa-frown"></i>
                    </div>
                @endforelse
            </div>
        @endisset
    </div>

    {{-- Результат
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
    --}}

    {{-- Форма --}}
    {{--
    <div class="col-xl-8">
        <form action="{{ route('paper-search') }}" method="GET">
            <div class="search-paper-year">
                <div class="paper-year-title">
                    <h4>Год</h4>
                </div>
                <div class="paper-year-radio">
                    @foreach(\App\Models\Pdf::getReleaseYear() as $release_year)
                        <input type="radio" name="year" id="year-radio-{{$release_year}}"
                               value="{{ $release_year }}" {{ ($release_year == $year) ? 'checked' : '' }}>
                        <label for="year-radio-{{ $release_year }}">{{ $release_year }}</label>
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
    --}}

@endsection
