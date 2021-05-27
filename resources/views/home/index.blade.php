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
    @if(config('app.mix_message_home'))
        <div id="vue-home"></div>
    @endif
    @include('partials.slider')



    <div class="row row-eq-height mt-5 mb-5 text-center home-squares">

        <div class="col-12 col-md">
            <div class="card shadow-sm telegram-whatsapp">
                <div class="card-body pr-6 pl-6">
                    @include('partials.telegram')
                </div>
            </div>
        </div>

        <div class="col-12 col-md">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    @include('partials.protocolo-login')
                </div>
            </div>
        </div>

    </div>

@stop

@section('content-sidebar')
    @include('partials.form-chat')
    @include('partials.telegram')
@stop
