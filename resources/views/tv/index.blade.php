@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">TV Alerj</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc"></a>
@stop

@section('content-main')

    <!--Load YouTube Video https://www.youtube.com/watch?v=e5iGB-228QA-->
    <div class="video-container">
        <iframe id="video" width="100%" height="100%"
                src="//www.youtube.com/embed/e5iGB-228QA?autoplay=1"
                allowfullscreen
                frameborder="0">
        </iframe>
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'DEFESA DO CONSUMIDOR',
         'telephone' => '0800 023 0007',
         'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
     ])
@stop
