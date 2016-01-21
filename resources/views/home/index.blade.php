@extends('layouts.master')

@section('page-name')
    <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel">
@stop

@section('sidebar-header')
    <div class="fundo-form-cabecalho">
        <div class="balao-chat">
            <img src="/templates/mv/svg/balao-chat.svg">
        </div>
    </div>
@stop

@section('contents')
    @include('partials.topo')

    @include('partials.chat')

    <div class="bg_video">
        <video autoplay loop poster="#">
            <source src="/templates/mv/videos/operadores_1.webm" type="video/webm">
            <source src="/templates/mv/videos/operadores_1.mp4" type="video/mp4">
        </video>
    </div>

    @include('partials.rodape')

    @include('partials.scripts')
@stop
