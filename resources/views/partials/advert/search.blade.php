<form action="{{ route('advert-search', ['section_id' => $section->id, 'type_id' => $type->id]) }}"
      method="GET"
      class="adv-search-form">
    @csrf

    <input type="hidden" value="{{ $section->id }}" name="section">
    <input type="hidden" value="{{ $type->id }}" name="type">

    <button class="btn-search" type="submit">Искать</button>

    {{--Выбор категории 3-го уровня--}}
    <div class="adv-search-form-input">
        <label for="input-subsection">{{ $section->name }}&nbsp;/&nbsp;{{ $type->name }}</label>
        <select class="" id="input-subsection" name="subsection">
            {{--<option>Выбрать...</option>--}}
            @foreach($subsections as $subsection)
                <option value="{{ $subsection->id }}"
                        @if($selected_subsection == $subsection->id)
                        selected
                        @endif
                >{{ $subsection->name }}</option>
            @endforeach
        </select>
    </div>

    {{--Дата подачи--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="start-date">Дата подачи</label>
        </div>
        <input type="date" id="start-date" name="trip-start"
               value="2014-01-02"
               min="2014-01-02" max="{{ date('Y-m-d') }}">
    </div>

    {{--Дата окончания--}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="end-date">Дата окончания</label>
        </div>
        <input type="date" id="end-date" name="trip-end"
               value="{{ date('Y-m-d') }}"
               min="2014-01-03" max="{{ date('Y-m-d') }}">
    </div>

    {{-- Vue component Тэги --}}
    <div class="adv-search-form-input">
        <div class="">
            <label for="tags">Тэги</label>
        </div>
        <input type="text" id="tags" name="tags" placeholder="2-комн, собственник">
    </div>

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
    <div class="adv-search-form-input">
        <div class="">
            <label for="phone">Телефон</label>
        </div>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{4-11}">
    </div>

</form>