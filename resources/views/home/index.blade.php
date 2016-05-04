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
        <div class="bg_video video-aloalerj">
            <video autoplay="" loop="" poster="#" class="img-responsive">
                <source src="/templates/mv/videos/Alo-alerj-novo-formato.webm" type="video/webm">
                <source src="/templates/mv/videos/Alo-alerj-novo-formato_1.mp4" type="video/mp4">
            </video>
        </div>

        {{--@include('partials.slider')--}}
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
