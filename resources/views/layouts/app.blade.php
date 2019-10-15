<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="{{ mix('js/app.js') }}" defer></script>

        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
            integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
            crossorigin="anonymous"
        >

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">

        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script>
            window.laravel = @json($laravel) //laravel.old
        </script>
    </head>

    <body>
        @if (!Request::is('login'))
            @include('layouts.navigation')
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('partials.alerts')

        <div id="@yield('vue-app-name')">
            @if (View::hasSection('heading'))
                <div class="container-fluid section-heading-bg">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            @section('heading') @show
                        </div>
                    </div>
                </div>
            @endif

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @yield('content-login')


    </body>
</html>
