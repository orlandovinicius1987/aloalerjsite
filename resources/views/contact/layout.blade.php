@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Fale com a Alerj</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop


@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'ALÔ ALERJ',
         'telephone' => '0800 022 0008',
         'site' => '<a href="http://www.alerj.rj.gov.br" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br</strong></div> </a>',
     ])
@stop
