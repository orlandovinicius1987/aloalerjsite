



<!-- Header -->
<div class="barra-dourada-top"></div>
<div class="cabecalho{{ isset($home) ? '-home' : '' }}">
    <div class="container">

        @if (isset($home))
            <div class="row row-eq-height">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="col-xs-offset-3 col-xs-8 col-lg-3">

                        <object type="image/svg+xml" data="/templates/mv/svg/logo-alo-alerj-branca.svg" class="alolerj-logo-home img-responsive">
                            AloAlerj Logo
                        </object>  </div>
                </div>
            </div>
        @else
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
        @endif
    </div>
</div>


<!-- End Header -->
