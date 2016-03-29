@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão para previnir <br/>e Combater a Pirataria</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    Prevenção e Combate a Pirataria


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Prevenção e Combate a Pirataria',
        'telephone' => '0800 282 6582',
        'site' => '',
    ])
@stop

