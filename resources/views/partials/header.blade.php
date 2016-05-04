<!-- Header -->
<div id="top" class="barra-dourada-top"></div>
<div class="cabecalho-home">
{{--<div class="cabecalho{{ isset($home) ? '-home' : '' }}">--}}
    <div class="container">
        {{--@if (isset($home))--}}
                <!-- Navigation -->
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-lg" href="/"><img src="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo img-responsive"></a>
                    <a class="navbar-brand" href="/">
                        <img src="/templates/mv/svg/logo-alo-alerj-nova.svg" class="alolerj-logo-home img-responsive visible-lg" alt="AloAlerj">
                        <img src="/templates/mv/svg/logo-alo-alerj-branca-nova.svg" class="alolerj-logo-home img-responsive hidden-lg" alt="AloAlerj">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right navbar-shadow">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="/pages/aloalerj">O Alô Alerj</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/pages/comittees">Comissões</a>
                        </li>
{{--                        <li class="page-scroll">
                            <a href="#contact">Contatos</a>
                        </li>--}}
                        <li class="page-scroll">
                            <a href="/pages/telefones">Telefones Úteis</a>
                        </li>
                        <li class="page-scroll">
                            <a href="http://www.alerj.rj.gov.br/" target="_blank">Alerj</a>
                        </li>
                        <li class="page-scroll menuicon">
                            <a href="/contact" title="Contato"> <i class="fa fa-envelope-o envelopemenu" aria-hidden="true"></i></a>
                        </li>


                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
{{--
        @else
            <div class="row row-eq-height">
                <div class="col-xs-12 col-sm-12 col-md-12 visible-xs visible-sm visible-md">
                    <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="alolerj-logo-home img-responsive"/>
                </div>
                <div class="hidden-xs hidden-sm hidden-md col-lg-9">
                    <div class="col-md-2 col-lg-2">
                        <a href="/">
                            <img src="/templates/mv/svg/logo-alerj-monocromatica.svg" alt="" class="alerj-logo visible-lg visible-md">
                            <img src="/templates/mv/svg/logo-alerj-monocromatica_fio-branco.svg" alt="" class="alerj-logo hidden-lg hidden-md">
                            --}}{{--<object type="image/svg+xml" data="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo">--}}{{--
                        --}}{{--Alerj Logo <!-- fallback image in CSS -->--}}{{--
                        --}}{{--</object>--}}{{--
                        </a>
                    </div>
                    <div class="col-md-7 col-lg-7">@yield('page-name')</div>
                    <div class="col-lg-3">@include('partials.telefones-uteis')</div>
                </div>
                <div class="sidebar-right-top hidden-xs hidden-sm hidden-md col-lg-3 text-center">@yield('sidebar-name')</div>
            </div>
        @endif--}}
    </div>
</div>
<!-- End Header -->
