<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="В архиве собраны более полутора миллионов объявлений Амурской области и более 1500 выпусков газет за последних 4 года.">
    <meta name="Keywords" content="
      архив,
      объявления,
      Газеты,
      архив тиражей архив газет архив 2019,
      архив 2018,
      архив 2017,
      архив 2016,
      архив объявлений,
      2019 архив тиражей,
      2018 архив тиражей,
      2017 архив тиражей,
      2016 архив тиражей,
      год архив,
      архив дважды два,
      архив Дважды два сайт,
      архивы области,
      смотреть архив">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body id="body">

    <div id="app">
        @include('partials.header.block')

        <main class="">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
