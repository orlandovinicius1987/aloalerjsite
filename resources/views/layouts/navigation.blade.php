<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/callcenter') }}">
            <img
                src="/templates/mv/svg/logo-alo-alerj-callcenter.svg"
                class="alolerj-logo-home img-responsive"
                alt="AloAlerj - Callcenter"
            >
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Entrar </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('records.advanced-search')}}"><i class="fab fa-searchengin"></i>Busca Avançada </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/callcenter') }}"><i class="fas fa-search"></i> Pesquisar </a>
                    </li>


                    @canany([
                        'committees:store',
                        'committees:update',
                        'areas:store',
                        'areas:update',
                        'origins:store',
                        'origins:update',
                    ])
                        <div class="nav-item dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-archive" aria-hidden="true"></i>Cadastros</a>
                            <div class="dropdown-menu">
                                @canany(['committees:store','committees:update'])
                                    <a class="nav-link dropdown-item" href="{{route('committees.index') }}"><i class="fas fa-layer-group"></i> Comissões </a>
                                @endcanany
                                @canany(['areas:store','areas:update'])
                                    <a class="nav-link dropdown-item" href="{{route('areas.index') }}"><i class="fas fa-stamp"></i> Assuntos </a>
                                @endcanany
                                @canany(['origins:store','origins:update'])
                                    <a class="nav-link dropdown-item" href="{{route('origins.index') }}"><i class="fas fa-globe-americas"></i> Origem </a>
                                @endcanany
                            </div>
                        </div>
                    @endcanany

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('records.nonResolved') }}"><i class="fas fa-times-circle"></i> Não Resolvidos </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-headphones-alt"></i> Site do Alô Alerj</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                Sair
                            </a>

                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
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
