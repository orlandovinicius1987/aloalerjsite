@extends('layouts.master')

@section('page-name')
    <object type="image/svg+xml" data="/templates/mv/svg/logo-alo-alerj.svg" class="alolerj-logo img-responsive">
        AloAlerj Logo
    </object>
@stop

@section('sidebar-name')
    <object type="image/svg+xml" data="/templates/mv/svg/balao-chat.svg" class="balao-chat">
        Logo Chat
    </object>
@stop

@section('content-main')

    <div class="slider">
        <div><img src="http://kenwheeler.github.io/slick/img/fonz1.png"></div>
        <div><img src="http://kenwheeler.github.io/slick/img/fonz2.png"></div>
        <div><img src="http://kenwheeler.github.io/slick/img/fonz3.png"></div>
    </div>

    {{--<div class="bg_video">--}}
        {{--<video autoplay="" loop="" poster="#" class="img-responsive">--}}
            {{--<source src="/templates/mv/videos/operadores_1.webm" type="video/webm">--}}
            {{--<source src="/templates/mv/videos/operadores_1.mp4" type="video/mp4">--}}
        {{--</video>--}}
    {{--</div>--}}

    <div class="visible-xs">

        <div class="col-xs-12 text-center icones-apps-mobile">
            <div class="col-xs-6">
                <img src="/templates/mv/svg/whatsapp.svg" class="img-responsive">
                <P>WhatsApp</P>
            </div>

            <div class="col-xs-6">
                <img src="/templates/mv/svg/telegram.svg" class="img-responsive">
                <P>Telegram</P>
            </div>
        </div>

        <div class="col-xs-12 text-center">
            <p>
                Use outros meios para fazer contato com o Alô Alerj pelo aplicativos WhatsApp ou Telegram, usando o número
            </p>
                <div class="telefone">21 98890 4742</div>
        </div>

    </div>
@stop

@section('content-sidebar')
    <form class="form-horizontal">
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
    <div class="texto-chat">
        <p>
            Use outros meios para fazer contato com o Alô Alerj pelo aplicativos abaixo, usando o número
            <strong class="telefone">21 98890 4742.</strong>
        </p>
    </div>
    <div class="icones-apps text-center">
        <div class="col-sm-6">
            <a href="https://www.whatsapp.com/?l=pt_br" target="_blank" class="whatsapp">
                <img src="/templates/mv/svg/whatsapp.svg" class="img-responsive">
                <p class="leg-whatsapp">WhatsApp</p></a>
        </div>
        <div class="col-sm-6">
            <a href="https://telegram.org" target="_blank" class="telegram">
                <img src="/templates/mv/svg/telegram.svg" class="img-responsive">
                <p class="leg-telegram">Telegram</p></a>
        </div>
    </div>
@stop
