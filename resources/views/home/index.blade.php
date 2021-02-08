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

    @include('partials.slider')

    <div class="row row-cols-1 row-cols-md-3 mt-5 mb-5 text-center">
        <div class="col">
            <div class="card mb-4 shadow-sm">
                @include('partials.form-chat-offline')
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                        @include('partials.telegram')
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Acompanhamento
                        de Protocolo</h4>
                </div>
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
