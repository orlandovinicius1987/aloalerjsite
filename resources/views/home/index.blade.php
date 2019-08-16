@extends('layouts.master')

@section('page-name')
    <object type="image/svg+xml" data="/templates/mv/svg/logo-alo-alerj-branca.svg" class="alolerj-logo img-responsive">
        AloAlerj Logo
    </object>
@stop

@section('sidebar-name')
    @include('partials.chat-header')
@stop

@section('content-main')
    <div class="hidden-xs hidden-sm hidden-md">
        <div class="jumbotron" style="margin-top: 25px;">
            <h1>ATENÇÃO</h1>
            <p>O serviço Alô Alerj estará passando por uma reformulação nos próximos dias, o que poderá ocasionar sobrecarga nas linhas telefônicas que integram o sistema 0800. Lembramos que as mensagens também podem ser encaminhadas pelo site da Alerj, por meio do link
                <a href="https://www.aloalerj.rj.gov.br/contact">https://www.aloalerj.rj.gov.br/contact</a>.</p>
        </div>

        <br><br>
        <div class="jumbotron">
            <h1>ATENÇÃO</h1>
            <p>O serviço Alô Alerj estará passando por uma reformulação nos próximos dias, o que poderá ocasionar sobrecarga nas linhas telefônicas que integram o sistema 0800. Lembramos que as mensagens também podem ser encaminhadas pelo site da Alerj, por meio do link
                <a href="https://www.aloalerj.rj.gov.br/contact">https://www.aloalerj.rj.gov.br/contact</a>.</p>
        </div>

        @include('partials.slider-desktop')

        <div class="row row-eq-height blocos">
            <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                @include('partials.form-chat')
            </div>
            <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                @include('partials.telegram')
            </div>
            <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                @include('partials.protocolo-login')
            </div>
        </div>
    </div>

    <div class="visible-xs visible-sm visible-md">
        <div class="row">
            @include('partials.slider')
            <div class="col-xs-12 col-sm-6 mobile-chat visible-xs visible-sm visible-md">
                @include('partials.form-chat')
            </div>

            <div class="col-xs-12 col-sm-6 mobile-telegram visible-xs visible-sm  visible-md">
                @include('partials.telegram')
            </div>
        </div>
    </div>
@stop

@section('content-sidebar')
    @include('partials.form-chat')
    @include('partials.telegram')
@stop
