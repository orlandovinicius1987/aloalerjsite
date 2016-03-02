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


    <div class="bg_video">
        <video autoplay="" loop="" poster="#" class="img-responsive">
            <source src="/templates/mv/videos/operadores_1.webm" type="video/webm">
            <source src="/templates/mv/videos/operadores_1.mp4" type="video/mp4">
        </video>
    </div>






@stop

@section('content-sidebar')
    @include('partials.form-chat')
    @include('partials.telegram')

@stop
