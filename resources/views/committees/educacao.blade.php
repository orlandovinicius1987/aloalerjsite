@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Educação</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <div class="texto-comissao">
        A Comissão de Educação cuida dos assuntos relacionados ao sistema educacional. Compete a ela opinar e dar seguinte às proposições e assuntos relativos à educação e instrução pública e particular.
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Educação',
        'telephone' => '0800 282 1559',
        'site' => '',
    ])
@stop

