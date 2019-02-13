<div id="right-slide-nav" class="sidenav">
    <div id="closebtn">&times;</div>

    <div class="accordion" id="accordion">
        {{-- Недвижемость --}}
        <div class="card">
            <div id="heading-1">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                        Недвижемость
                    </button>
                </h5>
            </div>

            <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 867]) }}">Продаю</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 118]) }}">Сдаю</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 538]) }}">Куплю</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 539]) }}">Сниму</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 119]) }}">Меняю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Коммерческая недвижемость. Бизнес --}}
        <div class="card">
            <div id="heading-2">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                        Коммерческая недвижемость
                    </button>
                </h5>
            </div>
            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1049]) }}">Продаю</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1052]) }}">Аренда</a></li>
                        <li class="slide-types-item"><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1050]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Авто --}}
        <div class="card">
            <div id="heading-3">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                        Авто
                    </button>
                </h5>
            </div>

            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1089]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1091]) }}">Куплю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1092]) }}">Аренда</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1331]) }}">Обмен</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Работа --}}
        <div class="card">
            <div id="heading-4">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">
                        Работа
                    </button>
                </h5>
            </div>

            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1244]) }}">Вакансии</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1245]) }}">Резюме</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Дом --}}
        <div class="card">
            <div id="heading-5">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="true" aria-controls="collapse-5">
                        Дом
                    </button>
                </h5>
            </div>

            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1071]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1073]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Детское --}}
        <div class="card">
            <div id="heading-6">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                        Детское
                    </button>
                </h5>
            </div>

            <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1126]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1128]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Строительство. Ремонт --}}
        <div class="card">
            <div id="heading-7">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">
                        Строительство. Ремонт
                    </button>
                </h5>
            </div>

            <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1231]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1232]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Услуги --}}
        <div class="card">
            <div id="heading-8">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-8" aria-expanded="true" aria-controls="collapse-8">
                        Услуги
                    </button>
                </h5>
            </div>

            <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="#">Все услуги?????</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Электроника --}}
        <div class="card">
            <div id="heading-9">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-9" aria-expanded="true" aria-controls="collapse-9">
                        Электроника
                    </button>
                </h5>
            </div>

            <div id="collapse-9" class="collapse" aria-labelledby="heading-9" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1045]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1046]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Одежда. Аксессуары --}}
        <div class="card">
            <div id="heading-10">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                        Одежда. Аксессуары
                    </button>
                </h5>
            </div>

            <div id="collapse-10" class="collapse" aria-labelledby="heading-10" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1154]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1156]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Хобби. Отдых. Спорт --}}
        <div class="card">
            <div id="heading-11">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-11" aria-expanded="true" aria-controls="collapse-11">
                        Хобби. Отдых. Спорт
                    </button>
                </h5>
            </div>

            <div id="collapse-11" class="collapse" aria-labelledby="heading-11" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1175]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1176]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Животные --}}
        <div class="card">
            <div id="heading-12">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-12" aria-expanded="true" aria-controls="collapse-12">
                        Животные
                    </button>
                </h5>
            </div>

            <div id="collapse-12" class="collapse" aria-labelledby="heading-12" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1188]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1189]) }}">Куплю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1190]) }}">Отдам</a></li>
                        <li><a href="#">Другоe??????</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Дача. Урожай --}}
        <div class="card">
            <div id="heading-13">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-13" aria-expanded="true" aria-controls="collapse-13">
                        Дача. Урожай
                    </button>
                </h5>
            </div>

            <div id="collapse-13" class="collapse" aria-labelledby="heading-13" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1109]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1111]) }}">Куплю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Пропажи. Находки --}}
        <div class="card">
            <div id="heading-14">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-14" aria-expanded="true" aria-controls="collapse-14">
                        Пропажи. Находки
                    </button>
                </h5>
            </div>

            <div id="collapse-14" class="collapse" aria-labelledby="heading-14" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1220]) }}">Личные вещи</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1221]) }}">Документы</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1223]) }}">Другое</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Разное --}}
        <div class="card">
            <div id="heading-15">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-15" aria-expanded="true" aria-controls="collapse-15">
                        Разное
                    </button>
                </h5>
            </div>

            <div id="collapse-15" class="collapse" aria-labelledby="heading-15" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1330]) }}">Продаю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1290]) }}">Куплю</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1225]) }}">Дарю</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Знакомства --}}
        <div class="card">
            <div id="heading-16">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-16" aria-expanded="true" aria-controls="collapse-16">
                        Знакомства
                    </button>
                </h5>
            </div>

            <div id="collapse-16" class="collapse" aria-labelledby="heading-16" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1217]) }}">Ищу её</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1218]) }}">Ищу его</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Ищу людей --}}
        <div class="card">
            <div id="heading-17">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-17" aria-expanded="true" aria-controls="collapse-17">
                        Ищу людей
                    </button>
                </h5>
            </div>

            <div id="collapse-17" class="collapse" aria-labelledby="heading-17" data-parent="#accordion">
                <div class="card-body">
                    <ul class="slide-types">
                        <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1210]) }}">На подселение</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1211]) }}">Попутчика</a></li>
                        <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1215]) }}">Другое</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>