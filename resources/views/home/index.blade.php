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
    <div class="container-fluid mobile-content hidden-xs">
        <div class="bg_video">
            <video autoplay="" loop="" poster="#" class="img-responsive">
                <source src="/templates/mv/videos/operadores_1.webm" type="video/webm">
                <source src="/templates/mv/videos/operadores_1.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <div class="visible-xs">
        <div class="row">
            @include('partials.slider')
            <div class="col-xs-12 mobile-chat visible-xs ">
                @include('partials.form-chat')
            </div>
            <div class="col-xs-12 mobile-telegram visible-xs ">
                @include('partials.telegram')
            </div>
        </div>
    </div>
@stop

@section('content-sidebar')
    @include('partials.form-chat')
    @include('partials.telegram')
@stop
