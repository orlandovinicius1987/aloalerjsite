<!-- Header -->
<div class="barra-dourada-top"></div>
<div class="cabecalho">
    <div class="container">
        <div class="row">
            @yield('page-name')

            @include('partials.telefones-uteis')

            <div class="navbar-right col-xs-12 col-sm-3 col-md-3 col-lg-3 hidden-xs" id="myNavbar">
                @yield('sidebar-name')
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
