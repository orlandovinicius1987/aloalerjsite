@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">TV Alerj</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc"></a>
@stop

@section('content-main')
    <div class="spacer"></div>
    <div class="video-wrapper">
        <div id="video-player"></div>
    </div>
@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'TV ALERJ',
         'telephone' => '2588-1510',
         'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
         'hours' => 'Aqui você tem poder!'
     ])
@stop
