<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker-2.5.20/jquery.datetimepicker.css') }}">

</head>
<body>
    <div class="wrapper" id="app">
        @include('layouts.components.nav')
        <main class="container-fluid">
            <div class="row">
                <div class="col-md-2 border-right">
                    @include('layouts.components.side_nav')
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-2 border-left">
                @if( Request::is('analytics*') )
                    <dashboard-config-component></dashboard-config-component>
                @endif
                </div>
            </div>
        </main>

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')

    <script src="{{ asset('js/datetimepicker-2.5.20/jquery.js') }}" ></script>
    <script src="{{ asset('js/datetimepicker-2.5.20/build/jquery.datetimepicker.full.min.js') }}" ></script>
</body>
<script>
$(document).ready(function(){
    $('.date').datetimepicker({
        datepicker: true,
        timepicker: true,
        format: 'd.m.Y H:i',
        step: 15
    }).after('<div class="input-group-append datetimepicker"><span class="input-group-text"><i class="fas fa-calendar"></i></span></div>');

    $('span.input-group-text').each(function(){
        $( this ).addClass('text-primary');
    });
});
</script>
</html>
