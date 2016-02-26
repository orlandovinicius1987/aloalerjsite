<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alô Alerj</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="//fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/templates/mv/css/custom.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        @include('partials.header')

        <!-- Content -->
        <div class="container">

            <div class="row row-eq-height">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    @yield('content-main')
                </div>

                <div class="sidebar-right col-xs-12 col-sm-3 col-md-3 col-lg-3 hidden-xs">
                    @yield('content-sidebar')
                </div>
            </div>
        </div>
        <!-- End Content -->

        @include('partials.footer')
        @include('partials.scripts')
    </body>
</html>


