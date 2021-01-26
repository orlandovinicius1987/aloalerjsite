<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="alerj, alo alerj, call center, callcenter, chat, cidadao, comissoes, whatsapp, telegram, operador, atendimento" />
        <meta name="description" content="Sistema de Atendimento via Chat do Alo Alerj e Comissoes" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script>
            window.laravel = @json($laravel) //laravel.old
        </script>
    </head>

    <body id="vue-app">
        @include('partials.header')

        @include('partials.main-alerts')

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
