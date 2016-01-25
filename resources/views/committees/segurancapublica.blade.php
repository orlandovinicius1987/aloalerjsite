@extends('layouts.master')

@section('page-name')
    <div class="conteiner-logo">
        @include('partials.logo-alerj-comissoes')

        <h1 class="nome-cmissao">SEGURANÇA PÚBLICA</h1>
    </div>
@stop

@section('sidebar-name')
    <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc">
@stop

@section('contents')
    @include('partials.header')

    @include('partials.committee-telephone', [
        'title' => 'DISQUE SEGURANÇA PÚBLICA',
        'telephone' => '0800 023 0007',
        'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
    ])

    <div class="conteiner-conteudo">
        <img src="http://www.alerj.rj.gov.br/fotos/busconsumidor_04_fv_30_06_14.jpg" class="imagem-comissao">
        <p class="texto-comissao">A Comissão de Defesa dos Direitos do Consumidor zela pelos seus direitos enquanto consumidor, seja de serviços ou produtos. Ela se manifesta aos assuntos referentes à economia popular; à composição, qualidade, apresentação, publicidade e distribuição de bens e serviços; às relações de consumo e medidas de defesa do consumidor; e ao acolhimento e investigação de denúncias relacionados aos direitos do consumidor.<br/>
            Existem várias formas de entrar em contato com a comissão. Os atendimentos são feitos pelos canais do Alô Alerj ou presencialmente, na sala localizada no térreo do prédio da Alerj, na Rua da Alfândega, número 8. A comissão também vai até você por meio do Ônibus Itinerante, que faz rotas por todo o Estado. Para solicitar a presença do Ônibus da Defesa do Consumidor em seu bairro e conferir os itinerários já programados, <a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"><strong>clique aqui</strong></a>.</p>
    </div>

    @include('partials.rodape')

    @include('partials.scripts')
@stop

