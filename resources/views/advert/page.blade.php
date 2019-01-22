@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-11">
                <form action="{{ route('advert-search', ['section_id' => $section->id, 'type_id' => $type->id]) }}" method="GET" class="form-inline mb-3">
                    @csrf

                    <input type="hidden" value="{{ $section->id }}" name="section">
                    <input type="hidden" value="{{ $type->id }}" name="type">

                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="input-subsection">{{ $section->name }}&nbsp;/&nbsp;{{ $type->name }}</label>
                        </div>
                        <select class="custom-select" id="input-subsection" name="subsection">
                            <option>Выбрать...</option>
                            @foreach($subsections as $subsection)
                                <option value="{{ $subsection->id }}"
                                        @if($selected_subsection == $subsection->id)
                                        selected
                                        @endif
                                >{{ $subsection->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Дата подачи</span>
                        </div>
                        <input type="date" id="start-date" name="trip-start"
                               min="2018-01-01" max="2018-12-31">
                    </div>

                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Дата окончания</span>
                        </div>
                        <input type="date" id="end-date" name="trip-end"
                               min="2018-01-01" max="2018-12-31">
                    </div>

                    <button class="btn btn-primary" type="submit">Искать</button>
                </form>
            </div>
            <div class="col-xl-1">
                <span onclick="openNav()" class="right-slide-menu-btn"><i class="fas fa-bars"></i></span>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tbody>
                @forelse($adverts as $advert)
                    <tr>
                        <td>{{ $advert->body }}</td>
                    </tr>
                @empty
                    <tr>
                        <td><i class="far fa-frown"></i>&nbsp;Нет обьявлений</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7">
                        <ul class="pagination float-right">
                            {{$adverts->links()}}
                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @include('partials.right_slide_menu')

    <script>
        function openNav() {
            document.getElementById("right-slide-nav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("right-slide-nav").style.width = "0";
        }
    </script>
@endsection