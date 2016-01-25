@extends('layouts.master')

@section('page-name')
    <div class="logo-alerj-top">
        <a href="index.html"> <img src="/templates/mv/svg/logo-alerj-monocromatica.svg"></a>
        <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel">
    </div>
@stop

@section('sidebar-name')
    <img src="/templates/mv/svg/balao-chat.svg">
@stop

@section('contents')
    @include('partials.header')

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
