<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width:device-width, device-pixel-ratio: 2">
        <title>Alô Alerj</title>
        <link rel="stylesheet" type="text/css" href="{{ env('CHAT_ALOALERJ_CSS') }}">
        <link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="{{ elixir('assets/js/preload.js') }}"></script>
    </head>

    <body>
        @include('layouts.partials.globalVariables')

        <div class="cabecalho">
            <div class="barra-azul-top"></div>
            <div class="barra-dourada-top"></div>

            <div class="logo-alerj-top-chat">
                <a href="../index.html"> <img src="{{ env('CHAT_ALOALERJ_BASE') }}/templates/mv/svg/logo-alerj-monocromatica.svg"></a>
                <img src="{{ env('CHAT_ALOALERJ_BASE') }}/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel">
            </div>
        </div>

        @include('notifications.flash')
        @yield('contents')

        <script src="{{ elixir('assets/js/client.js') }}"></script>

        @yield('javascript')
    </body>
</html>
