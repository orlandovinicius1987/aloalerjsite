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

        <script>
            function alertSize() {
                var myWidth = 0, myHeight = 0;
                if( typeof( window.innerWidth ) == 'number' ) {
                    //Non-IE
                    myWidth = window.innerWidth;
                    myHeight = window.innerHeight;
                } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
                    //IE 6+ in 'standards compliant mode'
                    myWidth = document.documentElement.clientWidth;
                    myHeight = document.documentElement.clientHeight;
                } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
                    //IE 4 compatible
                    myWidth = document.body.clientWidth;
                    myHeight = document.body.clientHeight;
                }
                window.alert( 'Width = ' + myWidth );
                window.alert( 'Height = ' + myHeight );
            }
        </script>
    </body>
</html>
