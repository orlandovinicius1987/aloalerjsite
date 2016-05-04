@extends('layouts.master')

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <div class="page-name">

        <h1 class="nome-comissao ">{{ $committee['name'] }}</h1>

        <div class="comissoes-telefone visible-lg">
            @include('partials.committee-telephone', [
              'title' => '',
              'telephone' => $committee['phone'],
              'site' => '',
          ])</div>
    </div>
    <div class="hidden-lg">
        @include('partials.committee-telephone', [
           'title' => '',
           'telephone' => $committee['phone'],
           'site' => '',
       ])
    </div>

    <div class="texto-comissao">
        {!! $committee['texto'] !!}
    </div>

    @if ($committee['president'] && $committee['vice-president'])
        <div class="ficha-comissao text-center">
            <div class="comissao-presidente"><h3>Presidente</h3>{!! $committee['president'] !!} </div>
            <div class="comissao-secretario"><h3>Vice-Presidente</h3>{!! $committee['vice-president'] !!} </div>

            <div class="comissao-dados">
                <div class="comissao-telefones"><span class="comissao-outrostelefones">Outros telefones:</span>{!! $committee['office-phone'] !!}</div>
                <div class="comissao-endereco">{!! $committee['office-address'] !!}</div>
            </div>
        </div>
    @endif
@stop
{{--

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => $committee['short_name'],
        'telephone' => $committee['phone'],
        'site' => '',
    ])
    @include('partials.telegram')
@stop
--}}

