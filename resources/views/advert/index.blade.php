@extends('layouts.app')

@section('content')
    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-active">
            Объявления
        </li>
    </ul>

    <div class="container mb-5" id="advert-select-block">
        <div class="row">

            <div class="col-xl-6">
                {{-- Недвижемость --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-home"></i></div>
                        <div class="advert-category-title"><h4>Недвижимость</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 867]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 118]) }}">Сдаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 538]) }}">Куплю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 539]) }}">Сниму</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 119]) }}">Меняю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Коммерческая недвижемость. Бизнес --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-city"></i></div>
                        <div class="advert-category-title"><h4>Коммерческая недвижимость. Бизнес</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1049]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1052]) }}">Аренда</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1047, 'type_id' => 1050]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Авто --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-car"></i></div>
                        <div class="advert-category-title"><h4>Авто</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1089]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1091]) }}">Куплю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1092]) }}">Аренда</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1088, 'type_id' => 1331]) }}">Обмен</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Работа --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-briefcase"></i></div>
                        <div class="advert-category-title"><h4>Работа</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1244]) }}">Вакансии</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1243, 'type_id' => 1245]) }}">Резюме</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Дом --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-chair"></i></div>
                        <div class="advert-category-title"><h4>Дом</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1071]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1042, 'type_id' => 1073]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Детское --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-child"></i></div>
                        <div class="advert-category-title"><h4>Детское</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1126]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1125, 'type_id' => 1128]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Строительство. Ремонт --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-brush"></i></div>
                        <div class="advert-category-title"><h4>Строительство. Ремонт</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1231]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1229, 'type_id' => 1232]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Услуги --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-concierge-bell"></i></div>
                        <div class="advert-category-title"><h4>Услуги</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 277]) }}">Юридические</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1076]) }}">Изготовление и ремонт мебели</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1094]) }}">Грузоперевозки</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1127]) }}">Установка, ремонт бытовой техники</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1129]) }}">Услуги по уходу</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1130]) }}">Образовательные</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1132]) }}">Компьютерные</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1135]) }}">Праздничные</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1136]) }}">Услуги по красоте</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1138]) }}">Бухгалтерские</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1140]) }}">Услуги по прописке</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1158]) }}">Пошив, ремонт одежды</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1230]) }}">Строительные</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1, 'type_id' => 1141]) }}">Прочие</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Электроника --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-mobile-alt"></i></div>
                        <div class="advert-category-title"><h4>Электроника</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1045]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1043, 'type_id' => 1046]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                {{-- Одежда. Аксессуары --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-tshirt"></i></div>
                        <div class="advert-category-title"><h4>Одежда. Аксессуары</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1154]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1152, 'type_id' => 1156]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Хобби. Отдых. Спорт --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-futbol"></i></div>
                        <div class="advert-category-title"><h4>Хобби. Отдых. Спорт</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1175]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1173, 'type_id' => 1176]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Животные --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-cat"></i></div>
                        <div class="advert-category-title"><h4>Животные</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1188]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1189]) }}">Куплю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1190]) }}">Отдам</a>
                            </li>

                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1191]) }}">Возьму в дар</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1192]) }}">Вязка</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1187, 'type_id' => 1193]) }}">Услуги для животных</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Дача. Урожай --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-apple-alt"></i></div>
                        <div class="advert-category-title"><h4>Дача. Урожай</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1109]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1107, 'type_id' => 1111]) }}">Куплю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Пропажи. Находки --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-box-open"></i></div>
                        <div class="advert-category-title"><h4>Пропажи. Находки</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1220]) }}">Личные
                                    вещи</a></li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1221]) }}">Документы</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1219, 'type_id' => 1223]) }}">Другое</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Разное --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="far fa-clone"></i></div>
                        <div class="advert-category-title"><h4>Разное</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1330]) }}">Продаю</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1290]) }}">Куплю</a>
                            </li>
                            <li>
                                <a href="{{ route('advert-page', ['section_id' => 1224, 'type_id' => 1225]) }}">Дарю</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Знакомства --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-heart"></i></div>
                        <div class="advert-category-title"><h4>Знакомства</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1217]) }}">Ищу
                                    её</a></li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1216, 'type_id' => 1218]) }}">Ищу
                                    его</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Ищу людей --}}
                <div class="wrapper-advert-category">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-users"></i></div>
                        <div class="advert-category-title"><h4>Ищу людей</h4></div>
                    </div>
                    <div class="advert-category-list-items">
                        <ul>
                            <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1210]) }}">На
                                    подселение</a></li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1211]) }}">Попутчика</a>
                            </li>
                            <li><a href="{{ route('advert-page', ['section_id' => 1209, 'type_id' => 1215]) }}">Другое</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Подать обьявление --}}
                <a class="wrapper-advert-category advert-add" href="https://2x2.su/add" target="_blank">
                    <div class="advert-category">
                        <div class="advert-category-item"><i class="fas fa-clipboard-check"></i></div>
                        <div class="advert-category-title">
                            <h4>Подать обьявление</h4>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
