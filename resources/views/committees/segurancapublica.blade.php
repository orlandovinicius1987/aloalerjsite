@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Segurança Pública e Assuntos de Polícia</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    Segurança Pública e Assuntos de Polícia


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Segurança Pública e Assuntos de Polícia',
        'telephone' => '0800 023 0376',
        'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
     ])
@stop

