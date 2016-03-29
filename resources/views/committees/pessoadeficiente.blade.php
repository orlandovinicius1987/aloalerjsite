@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão da Pessoa <br/>com Deficiência</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    Pessoa com Deficiência


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Pessoa com Deficiência',
        'telephone' => '0800 282 5005',
        'site' => '',
     ])
@stop
