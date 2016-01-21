<div class="cabecalho">
    <div class="barra-azul-top"></div>
    <div class="barra-dourada-top"></div>

    @yield('page-name')

    <div class="fundo-form-cabecalho">
        <div class="balao-chat">
            @yield('sidebar-name')
        </div>
    </div>

    @include('partials.telefones-uteis')
</div>
