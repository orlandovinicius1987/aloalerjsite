<!-- Header -->
<div class="barra-dourada-top"></div>
<div class="cabecalho">
    <div class="container">
        <div class="row">


            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="col-xs-5">
                    <a href="/">
                        <object type="image/svg+xml" data="/templates/mv/svg/logo-alerj-monocromatica.svg" class="alerj-logo">
                            Alerj Logo <!-- fallback image in CSS -->
                        </object>
                    </a>
                </div>

                <div class="col-xs-7">
                    @yield('page-name')

                </div>
            </div>

            @include('partials.telefones-uteis')

            <div class="navbar-right hidden-xs col-sm-3 col-md-3 col-lg-3" id="myNavbar">
                @yield('sidebar-name')
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
