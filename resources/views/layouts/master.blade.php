<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alô Alerj</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="//fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/templates/mv/css/carousel.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/templates/mv/css/custom.css">

    </head>

    <body>
        @include('partials.header')

        <!-- Content -->
        <div class="container hidden-xs hidden-sm">
            <div class="row row-eq-height">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    @yield('content-main')
                </div>

                <div class="sidebar-right col-xs-12 col-sm-3 col-md-3 col-lg-3 hidden-xs hidden-sm">
                    @yield('content-sidebar')
                </div>
            </div>
        </div>

        <div class="container-fluid mobile-content visible-xs visible-sm">
            @yield('content-main')
        </div>

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
                    scroll();
                    console.log('espada');
                }, 2000);

                jQuery("#scrollToTop").click(function()
                {
                    scroll();
                });
            })
        </script>
    </body>
</html>
