<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alô Alerj</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="alerj, alo alerj, call center, callcenter, chat, cidadao, comissoes, whatsapp, telegram, operador, atendimento" />
        <meta name="description" content="Sistema de Atendimento via Chat do Alo Alerj e Comissoes" />
        <meta name="Author" content="Antonio Carlos Ribeiro [https://antoniocarlosribeiro.com]" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="//fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/templates/mv/css/carousel.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/templates/mv/css/custom.css?breno={{rand(0,5000)}}">

        @if (Session::get('client') == 'app')
            <link rel="stylesheet" href="/templates/mv/app.css?breno={{rand(0,5000)}}">
        @endif

        <link rel="stylesheet" type="text/css" href="/templates/mv/css/navbar.css?breno={{rand(0,5000)}}">

        <script src="//cdn.socket.io/socket.io-1.4.5.js"></script>
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


            <div class="row row-eq-height blocos">
                <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                    @include('partials.form-chat')
                </div>
                <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                    @include('partials.app')
                </div>
                <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                    @include('partials.telegram')
                </div>

            </div>
        </div>

        {{--<div class="container-fluid mobile-content visible-xs visible-sm">--}}
            {{--@yield('content-main')--}}
        {{--</div>--}}

        <!-- End Content -->

        @include('partials.footer')
        @include('partials.scripts')

        {{--<script>--}}
            {{--function alertSize() {--}}
                {{--var myWidth = 0, myHeight = 0;--}}
                {{--if( typeof( window.innerWidth ) == 'number' ) {--}}
                    {{--//Non-IE--}}
                    {{--myWidth = window.innerWidth;--}}
                    {{--myHeight = window.innerHeight;--}}
                {{--} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {--}}
                    {{--//IE 6+ in 'standards compliant mode'--}}
                    {{--myWidth = document.documentElement.clientWidth;--}}
                    {{--myHeight = document.documentElement.clientHeight;--}}
                {{--} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {--}}
                    {{--//IE 4 compatible--}}
                    {{--myWidth = document.body.clientWidth;--}}
                    {{--myHeight = document.body.clientHeight;--}}
                {{--}--}}
                {{--window.alert( 'Width = ' + myWidth + ' -- ' +'Height = ' + myHeight);--}}
            {{--}--}}

            {{--alertSize();--}}
        {{--</script>--}}

        <script>
            function scroll()
            {
                window.parent.$("body").animate({scrollTop:-2000}, 'slow');
                window.scrollTo(x-coord, y-coord);
            }

            jQuery(document).ready(function()
            {
                setTimeout(function()
                {
                    $(function() {
                        var $window = $(window);
                        function top() {
                            var $top = $window.scrollTop();
                            if( $top > 100 ) {
                                $("#top").css("position","absolute");
                            }
                            else {
                                $("#top").css("position","fixed");
                            }
                        };
                        $(window).scroll(top);
                    });
                }, 2000);

                jQuery("#scrollToTop").click(function()
                {
                    scroll();
                });
            });

            jQuery("a[target='_blank']").click(function(e)
            {
                e.preventDefault();

                var url = jQuery(e.currentTarget).attr('href');

                window.open(url, '_system', '');

                return false;
            });

            jQuery(document).ready(function()
            {
                if ( jQuery('audio').length )
                {
                    jQuery('audio')[0].play();
                }
            });
        </script>

        @include('tv.video-player-script')

        @include('partials.google-analytics')
    </body>
</html>
