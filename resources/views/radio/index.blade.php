@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Radio Alerj</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc"></a>
    @stop

    @section('content-main')

    <!-- Load Radio -->
    <div class="radio-content text-center">
        {{--<img src="/templates/mv/img/radio-alerj.png" alt="" class="">--}}

        <audio controls >
            <source src="//centova10.ciclanohost.com.br:6044/live.mp3" type="audio/mpeg">
            Seu browser não suporta o elemento de audio!
        </audio>

        {{--<iframe--}}
                {{--src="//centova10.ciclanohost.com.br:6044/live.mp3"--}}
                {{--allowfullscreen--}}
                {{--frameborder="0">--}}
        {{--</iframe>--}}
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'DEFESA DO CONSUMIDOR',
         'telephone' => '0800 023 0007',
         'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
     ])
@stop
