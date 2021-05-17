<nav class="navbar navbar-expand-xl navbar-light navbar-laravel">
    <a class="navbar-brand" href="{{ url('/callcenter') }}">
        <img class="ml-3 aloalerj-logo-home"  src="/templates/mv/svg/logo-alo-alerj-callcenter.svg" alt="AloAlerj - Callcenter">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mr-3" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
           @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Entrar </a>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('records.advanced-search')}}"><i class="fas fa-search-plus"></i>Busca Avançada</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/callcenter') }}"><i class="fas fa-search"></i> Pesquisar</a>
            </li>
            @canany([
                        'committees:store',
                        'committees:update',
                        'areas:store',
                        'areas:update',
                        'origins:store',
                        'origins:update',
                    ])
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-archive" aria-hidden="true"></i>cadastros</a>
                <div class="dropdown-menu">
                    @canany(['committees:store','committees:update'])
                        <a class="nav-link dropdown-item" href="{{route('committees.index') }}"><i class="fas fa-layer-group"></i>comissões</a>
                    @endcanany
                    @canany(['areas:store','areas:update'])
                        <a class="nav-link dropdown-item" href="{{route('areas.index') }}"><i class="fas fa-stamp"></i>assuntos</a>
                    @endcanany
                    @canany(['origins:store','origins:update'])
                        <a class="nav-link dropdown-item" href="{{route('origins.index') }}"><i class="fas fa-globe-americas"></i> Origem </a>
                    @endcanany
                </div>
            </li>
                @endcanany
            <li class="nav-item">
                <a class="nav-link" href="{{route('records.nonResolved') }}"><i class="fas fa-times-circle"></i>Não resolvidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fas fa-headphones-alt"></i>Site do alô alerj</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false" href="#" v-pre><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item nav-link" href="{{route('logout')}}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">sair</a>
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
</nav>
