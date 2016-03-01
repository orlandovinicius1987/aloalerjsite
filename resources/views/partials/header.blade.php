



<!-- Header -->
<div class="barra-dourada-top"></div>
<div class="cabecalho">
    <div class="container">

        <div class="row row-eq-height">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                    <a href="/">
                    <object type="image/svg+xml" data="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo">
                    Alerj Logo <!-- fallback image in CSS -->
                    </object>
                    </a>
                </div>
                <div class="col-xs-8 col-lg-3">@yield('page-name')</div>
                <div class="hidden-xs col-lg-7">@include('partials.telefones-uteis')</div>
            </div>
            <div class="sidebar-right-top hidden-xs col-sm-3 col-md-3 col-lg-3 text-center">@yield('sidebar-name')</div>
        </div>

        <div class="col-xs-12 visible-xs ">
            <form class="form-vertical">
                <div class="form-group">
                    <label for="input-nome">Nome</label>
                    <input type="name" class="form-control" id="input-nome" placeholder="Insira o seu nome">
                </div>
                <div class="form-group">
                    <label for="input-email">Email</label>
                    <input type="email" class="form-control" id="input-email" placeholder="Insira o seu email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block iniciar-conversa">Iniciar Conversa
                    </button>
                </div>
            </form>

        </div>

        {{--<div class="row">--}}
            {{--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
                {{--<div class="col-xs-5">--}}
                    {{--<a href="/">--}}
                        {{--<object type="image/svg+xml" data="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo">--}}
                            {{--Alerj Logo <!-- fallback image in CSS -->--}}
                        {{--</object>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-7">--}}
                    {{--@yield('page-name')--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--@include('partials.telefones-uteis')--}}

            {{--<div class="navbar-right hidden-xs col-sm-3 col-md-3 col-lg-3" id="myNavbar">--}}
                {{--@yield('sidebar-name')--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<!-- End Header -->
