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
        @include('partials.slider-desktop')

        <div class="row row-eq-height blocos" id="vue-chat">

            <div class="col-xs-12 col-lg-4" v-show="! chatOnline">
                <div class="row row-eq-height blocos" >
                    <div class="boxshadow">
                        @include('partials.form-chat-offline')
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-lg-4 hidden-xs hidden-sm hidden-md">
                @include('partials.telegram')
            </div>

            <div :class="'col-xs-12 col-lg-'+(chatOnline ? 8: 4)+' hidden-xs hidden-sm hidden-md'">
                @include('partials.protocolo-login')
            </div>

        </div>
    </div>

    <div class="visible-xs visible-sm visible-md">
        <div class="row">


            @include('partials.slider')

{{--
            <div class="col-xs-12 col-sm-6 mobile-chat">
                @include('partials.form-chat')
            </div>
--}}

            <div class="col-xs-12 mobile-chat2">
                @include('partials.form-chat-offline')
            </div>

            <div class="col-xs-12 mobile-telegram">
                @include('partials.telegram')
            </div>

            <div class="col-xs-12 mobile-protocolo">

                @include('partials.protocolo-login')
            </div>


        </div>
    </div>
@stop

@section('content-sidebar')
    @include('partials.form-chat')
    @include('partials.telegram')
@stop
