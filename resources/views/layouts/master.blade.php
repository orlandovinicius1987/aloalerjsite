<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="alerj, alo alerj, call center, callcenter, chat, cidadao, comissoes, whatsapp, telegram, operador, atendimento" />
        <meta name="description" content="Sistema de Atendimento via Chat do Alo Alerj e Comissoes" />
E
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="//fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/templates/mv/css/carousel.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/templates/mv/css/custom.css?breno={{rand(0,5000)}}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if (Session::get('client') == 'app')
            <link rel="stylesheet" href="/templates/mv/app.css?breno={{rand(0,5000)}}">
        @endif

        <link rel="stylesheet" type="text/css" href="/templates/mv/css/navbar.css?breno={{rand(0,5000)}}">

        <script src="//cdn.socket.io/socket.io-1.4.5.js"></script>

        <script src="{{ mix('js/app.js') }}" defer></script>

        <script>
            window.laravel = @json($laravel) //laravel.old
        </script>
    </head>

    <body id="vue-app">
        @include('partials.header')

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @yield('content-main')
                </div>
            </div>
        </div>

        @include('partials.footer')

        <script src="/templates/mv/js/classie.js"></script>
        <script src="/templates/mv/js/cbpAnimatedHeader.js"></script>

        @include('tv.video-player-script')
        @include('partials.google-analytics')
    </body>
</html>
