@extends('layouts.master')

@section('page-name')
    <div class="conteiner-logo">
        @include('partials.logo-alerj-comissoes')

        <h1 class="nome-cmissao">COMISSÃO PARA PREVENIR <br/>E COMBATER A PIRATARIA</h1>
    </div>
@stop

@section('sidebar-name')
    <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc">
@stop

@section('contents')
    @include('partials.header')

    @include('partials.committee-telephone', [
        'title' => 'DISQUE PIRATARIA',
        'telephone' => '0800 282 3596',
        'site' => '',
    ])

    <!--Conteudo-->
    <div class="conteiner-conteudo">
        <img src="http://1.bp.blogspot.com/-0W62tYZer8k/UDUqHyVqi4I/AAAAAAAAAGw/0K6UGj02kuY/s1600/REVISTA+PAGINA+DUPLA.jpg" class="imagem-comissao-pirataria">
        <div>
            <p class="texto-comissao">A Comissão para Prevenir e Combater a Pirataria investiga pontos de comercialização de produtos piratas e trabalha para combatê-los. Para isso, conta com a ajuda da população, que pode fazer denúncias anônimas por meio do Alô Alerj.  Produtos ou obras piratas são aqueles que infringem patentes, direitos autorais ou são reproduções não autorizadas.
                Cabe à comissão:</p>
            <ul id="ul-pirataria">
                <li>Manifestar-se sobre todas as proposições pertinentes a assuntos relacionados à pirataria</li>
                <li>Fiscalizar e acompanhar os programas, projetos e ações governamentais na área de combate à pirataria</li>
                <li>Estimular ações da sociedade civil voltadas ao combate à pirataria no Estado</li>
                <li>Realizar discussões sobre o tema</li>
                <li>Promover campanhas de conscientização</li>
                <li>Propor ações preventivas aos governos e estimular pesquisas sobre o assunto</li>
            </ul>
        </div>
    </div>

    @include('partials.rodape')

    @include('partials.scripts')
@stop

