@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">{{ $committee['name'] }}</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')
    <div class="texto-comissao">
        {!! $committee['texto'] !!}
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => $committee['short_name'],
        'telephone' => $committee['phone'],
        'site' => '',
    ])
@stop

