<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand logo-alerj" href="http://www.alerj.rj.gov.br/" target="_blank">
            <img src="/templates/2021/images/ALERJ_NOVO_vertical-branco.png">
        </a>
        <a class="navbar-brand logo-aloalerj" href="/">
            <img src="/templates/2021/svg/logo-alo-alerj-branca-nova-sem0800.svg">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample08">
            <ul class="navbar-nav">
                <li class="nav-item {{Route::currentRouteName() == 'home' ? 'active' : ''}}" >
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'pages.aloalerj' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('pages.aloalerj')}}">O Alô Alerj</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'pages.committees' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('pages.committees')}}">Comissões</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'pages.telefones' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('pages.telefones')}}">Telefones Úteis</a>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'contact.index' ? 'active' : ''}}">
                    <a class="nav-link" href="/contact" title="Contato"> <i class="fa fa-envelope-o envelopemenu" aria-hidden="true"></i> Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@if($errors = session('errors'))
    @if (isset($errors) && $errors->any())

        <div class="alert alert-danger">
            <ul>
                <li>{{ $errors->first() }}</li>
            </ul>
        </div>

    @endif
@endif



{{--
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

            <a class="navbar-brand mr-5 logo-alerj" href="#">
                <img src="/templates/2021/images/ALERJ_NOVO_vertical-branco.png">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pages/aloalerj">O Alô Alerj</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/committees">Comissões</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/telefones">Telefones Úteis</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://www.alerj.rj.gov.br/" target="_blank">Alerj</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://transparencia.alerj.rj.gov.br/protocolo">Protocolo</a>
                    </li>
                    <li class="nav-item menuicon">
                        <a class="nav-link" href="/contact" title="Contato"> <i class="fa fa-envelope-o envelopemenu" aria-hidden="true"></i></a>
                    </li>
                </ul>
                <form>
                    <input class="form-control" type="text" placeholder="Número de Protocolo" aria-label="Número de Protocolo">
                </form>
            </div>
    </div>
</nav>
--}}


{{--

                    <a class="navbar-brand visible-lg" href="/"><img src="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo img-responsive"></a>
                    <a class="navbar-brand" href="/">
                        <img src="/templates/mv/svg/logo-alo-alerj-nova.svg" class="alolerj-logo-home img-responsive visible-lg" alt="AloAlerj">
                        <img src="/templates/mv/svg/logo-alo-alerj-branca-nova.svg" class="alolerj-logo-home img-responsive hidden-lg" alt="AloAlerj">
                    </a>

--}}


{{--



                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a class=nav-link href="/pages/aloalerj">O Alô Alerj</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/pages/committees">Comissões</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/pages/telefones">Telefones Úteis</a>
                        </li>
                        <li class="page-scroll">
                            <a href="http://www.alerj.rj.gov.br/" target="_blank">Alerj</a>
                        </li>
                        <li class="page-scroll">
                            <a href="http://transparencia.alerj.rj.gov.br/protocolo">Protocolo</a>
                        </li>
                        <li class="page-scroll menuicon">
                            <a href="/contact" title="Contato"> <i class="fa fa-envelope-o envelopemenu" aria-hidden="true"></i></a>
                        </li>
--}}
