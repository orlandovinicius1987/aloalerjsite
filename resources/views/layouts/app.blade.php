<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
              integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
              crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script>
            window.laravel = @json($laravel) //laravel.old
        </script>
    </head>
    <body>

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/callcenter') }}">
{{--                        <img src="/templates/mv/svg/logo-alerj-monocromatica.svg"
                             class="alerj-logo img-responsive  d-none d-xl-block">

                        <img src="/templates/mv/svg/logo-alo-alerj-nova.svg"
                             class="alolerj-logo-home img-responsive"
                             alt="AloAlerj"> - Call Center--}}

                        <img src="/templates/mv/svg/logo-alo-alerj-callcenter.svg"
                             class="alolerj-logo-home img-responsive"
                             alt="AloAlerj - Callcenter">

                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/callcenter') }}"><i class="fas fa-search"></i> Pesquisar </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('committees.index') }}"><i class="fas fa-layer-group"></i> Comissões </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('records.nonResolved') }}"><i class="fas fa-times-circle"></i> Não Resolvidos </a>
                            </li>

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Entrar </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

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

            @if (View::hasSection('heading'))
                <div class="container-fluid section-heading-bg">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            @include('partials.alerts')

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
    </body>
</html>
