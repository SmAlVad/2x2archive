<form action="{{ route('advert-search', ['section_id' => $section->id, 'type_id' => $type->id]) }}"
      method="GET"
      class="adv-search-form">
    @csrf

    {{--Выбор категории 3-го уровня--}}
    <div class="adv-search-form-input">
        <label for="input-subsection">{{ $section->name }}&nbsp;/&nbsp;{{ $type->name }}</label>
        <select class="" id="input-subsection" name="subtype">
            {{--<option>Выбрать...</option>--}}
            @foreach($subtypes as $subtype)
                <option value="{{ $subtype->id }}"
                        @if($selected_subtype == $subtype->id)
                        selected
                        @endif
                >{{ $subtype->name }}</option>
            @endforeach
        </select>
    </div>

    {{--Дата подачи--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="start-date">Дата подачи</label>
        </div>
        <input type="date" id="start-date" name="date-start"
               value="@if(isset($date_start)){{ $date_start }}@else{{ __('2013-10-11') }}@endif"
               min="2013-10-11" max="{{ date('Y-m-d') }}">
    </div>

    {{--Дата окончания--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="end-date">Дата окончания{{ old('date_end') }}</label>

        </div>
        <input type="date" id="end-date" name="date-end"
               value="@if(isset($date_end)){{ $date_end }}@else{{date('Y-m-d')}}@endif"
               min="2013-10-11" max="{{ date('Y-m-d') }}">
    </div>

    {{-- Vue component Тэги --}}
    <!--<div class="adv-search-form-input">
        <div class="">
            <label for="tags">Тэги</label>
        </div>
        <input type="text" id="tags" name="tags" placeholder="2-комн, собственник">
    </div>-->

    {{--Цена от--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="start-price">Цена от</label>
        </div>
        <input type="number" id="start-price" name="start-price" min="0" placeholder="в рублях">
    </div>

    {{--Цена до--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="end-price">Цена до</label>
        </div>
        <input type="number" id="end-price" name="end-price" min="0" placeholder="в рублях">
    </div>

    {{--Телефон--}}
    <!--<div class="adv-search-form-input">
        <div class="">
            <label for="phone">Телефон</label>
        </div>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{4-11}">
    </div>-->

    <button class="btn-search" type="submit">Искать</button>

</form>
