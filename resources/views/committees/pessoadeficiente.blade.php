@extends('layouts.master')

@section('page-name')
    <div class="conteiner-logo">
        @include('partials.logo-alerj-comissoes')

        <h1 class="nome-cmissao">COMISSÃO DA PESSOA <br/>COM DEFICIÊNCIA</h1>
    </div>
@stop

@section('sidebar-name')
    <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc">
    @stop

    @section('contents')
    @include('partials.header')

    @include('partials.committee-telephone', [
        'title' => 'DISQUE PESSOA PORTADORA DE DEFICIÊNCIA',
        'telephone' => '0800 282 3596',
        'site' => '',
    ])

    <!--Conteudo-->
    <div class="conteiner-conteudo">
        <img src="http://asmpf.org.br//wp-content/uploads/2014/09/acessibilidade_condominio-1716x700_c.jpg" class="imagem-comissao-dp">
        <p class="texto-comissao-pd">A Comissão da Pessoa com Deficiência tem como objetivo assegurar os direitos de todas as pessoas com algum tipo de deficiência. Ela recebe e investiga denúncias relacionas ao tema, por meio do Alô Alerj.  A comissão conta com a colaboração de entidades que estão relacionadas à causa. Compete a ela se manifestar sobre todas as proposições referentes à Pessoa com Deficiência, bem como à legislação pertinente.</p>
    </div>

    @include('partials.rodape')

    @include('partials.scripts')
@stop
