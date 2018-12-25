@extends('layouts.app')

@section('content')
    {{--
        Т.к. проект изночально не планировали развиать, категории выбираются из базы просто по id.
        Я знал что так делать не стоит. Но, данное решение это компромисс.
     --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Недвижемость --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #60ae36;"><i class="fas fa-home"></i></div>
                    <div class="category-list" style="border-right: 5px solid #60ae36;">
                        <div class="category-list-title"><h4>Недвижемость</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 867]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 118]) }}">Сдаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 538]) }}">Куплю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 539]) }}">Сниму</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 119]) }}">Меняю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Коммерческая недвижемость. Бизнес --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #144089;"><i class="fas fa-city"></i></div>
                    <div class="category-list" style="border-right: 5px solid #144089;">
                        <div class="category-list-title"><h4>Коммерческая недвижемость. Бизнес</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1049]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1052]) }}">Аренда</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1050]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Авто --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #d8005e;"><i class="fas fa-car"></i></div>
                    <div class="category-list" style="border-right: 5px solid #d8005e;">
                        <div class="category-list-title"><h4>Авто</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1089]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1091]) }}">Куплю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1092]) }}">Аренда</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1331]) }}">Обмен</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Работа --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #e8412d;"><i class="fas fa-briefcase"></i></div>
                    <div class="category-list" style="border-right: 5px solid #e8412d;">
                        <div class="category-list-title"><h4>Работа</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1244]) }}">Вакансии</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1245]) }}">Резюме</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Дом --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #347433;"><i class="fas fa-chair"></i></div>
                    <div class="category-list" style="border-right: 5px solid #347433;">
                        <div class="category-list-title"><h4>Дом</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1071]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1073]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Детское --}}
            <div class="col-xl-4 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #edde53;"><i class="fas fa-child"></i></div>
                    <div class="category-list" style="border-right: 5px solid #edde53;">
                        <div class="category-list-title"><h4>Детское</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1126]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1128]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Строительство. Ремонт --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #ced12f;"><i class="fas fa-brush"></i></div>
                    <div class="category-list" style="border-right: 5px solid #ced12f;">
                        <div class="category-list-title"><h4>Строительство. Ремонт</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1231]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1232]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Услуги --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #00a3a4;"><i class="fas fa-concierge-bell"></i></div>
                    <div class="category-list" style="border-right: 5px solid #00a3a4;">
                        <div class="category-list-title"><h4>Услуги</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="#">Все услуги?????</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Электроника --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #009fc9;"><i class="fas fa-mobile-alt"></i></div>
                    <div class="category-list" style="border-right: 5px solid #009fc9;">
                        <div class="category-list-title"><h4>Электроника</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1045]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1046]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Одежда. Аксессуары --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #ff748b;"><i class="fas fa-tshirt"></i></div>
                    <div class="category-list" style="border-right: 5px solid #ff748b;">
                        <div class="category-list-title"><h4>Одежда. Аксессуары</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1154]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1156]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Хобби. Отдых. Спорт --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #5ed1d5;"><i class="fas fa-futbol"></i></div>
                    <div class="category-list" style="border-right: 5px solid #5ed1d5;">
                        <div class="category-list-title"><h4>Хобби. Отдых. Спорт</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1175]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1176]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Животные --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #d5c188;"><i class="fas fa-cat"></i></div>
                    <div class="category-list" style="border-right: 5px solid #d5c188;">
                        <div class="category-list-title"><h4>Животные</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1188]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1189]) }}">Куплю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1190]) }}">Отдам</a></li>
                                <li><a href="#">Другоe??????</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Дача. Урожай --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #f28c1f;"><i class="fas fa-apple-alt"></i></div>
                    <div class="category-list" style="border-right: 5px solid #f28c1f;">
                        <div class="category-list-title"><h4>Дача. Урожай</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1109]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1111]) }}">Куплю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Пропажи. Находки --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #616260;"><i class="fas fa-box-open"></i></div>
                    <div class="category-list" style="border-right: 5px solid #616260;">
                        <div class="category-list-title"><h4>Пропажи. Находки</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1220]) }}">Личные вещи</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1221]) }}">Документы</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1223]) }}">Другое</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Разное --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #9aae7a;"><i class="far fa-clone"></i></div>
                    <div class="category-list" style="border-right: 5px solid #9aae7a;">
                        <div class="category-list-title"><h4>Разное</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1330]) }}">Продаю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1290]) }}">Куплю</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1225]) }}">Дарю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Знакомства --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #fd4444;"><i class="fas fa-heart"></i></div>
                    <div class="category-list" style="border-right: 5px solid #fd4444;">
                        <div class="category-list-title"><h4>Знакомства</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1217]) }}">Ищу её</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1218]) }}">Ищу его</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ищу людей --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #a5c5da;"><i class="fas fa-users"></i></div>
                    <div class="category-list" style="border-right: 5px solid #a5c5da;">
                        <div class="category-list-title"><h4>Ищу людей</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1210]) }}">На подселение</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1211]) }}">Попутчика</a></li>
                                <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1215]) }}">Другое</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Подать обьявление --}}
            <div class="col-xl-3 pb-3">
                <div class="category-wrapper">
                    <div class="category-logo" style="background-color: #c3eaed;"><i class="fas fa-clipboard-check"></i></div>
                    <div class="category-list" style="border-right: 5px solid #c3eaed;">
                        <div class="category-list-title"><h4>Подать обьявление</h4></div>
                        <div class="category-list-items">
                            <ul>
                                <li>Размещение в течении 5 минут</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
