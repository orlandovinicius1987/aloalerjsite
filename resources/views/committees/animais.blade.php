@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">
        Comissão de Protecao <br/>ao Direito dos Animais</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')
    <div class="texto-comissao">
        A Comissão de Defesa dos Animais cuida dos assuntos relacionados ao bem-estar dos animais e zela para que não sofram maus-tratos e abandono.
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Proteção ao Direito dos Animal',
        'telephone' => '0800 282 3595',
        'site' => '',
    ])
@stop

