@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Segurança Alimentar</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    Segurança Alimentar

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'DSegurança Alimentar',
        'telephone' => '0800 282 0376',
        'site' => '',
    ])
@stop

