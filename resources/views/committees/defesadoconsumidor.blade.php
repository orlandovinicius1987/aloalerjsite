@extends('layouts.master')

@section('page-name')
    <h1 class="nome-cmissao">COMISSÃO DE DEFESA <br/>DO CONSUMIDOR</h1>
@stop

@section('sidebar-header')
    <div class="fundo-form-cabecalho">
        <div class="balao-chat">
            <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel">
        </div>
    </div>
@stop

@section('contents')
    @include('partials.topo')

    <!--Chat-->
    <div class="chat">
        <div id="comunicacao">
            <div class="infos">
                <p class="titulo-comissao">DEFESA DO CONSUMIDOR</p>
                <div class="linha-info"></div>
                <div class="tel-comissao">0800 023 0007</div>
                <div class="linha-info"></div>
                <a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>
                <p class="outras-info">Atendimento das 8h às 20h</p>
            </div>
        </div>
    </div>

    <div class="fundo-form-cabecalho">
        <div class="balao-chat">
            <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel">
        </div>
    </div>

    <div class="conteiner-conteudo">
        <img src="http://www.alerj.rj.gov.br/fotos/busconsumidor_04_fv_30_06_14.jpg" class="imagem-comissao">
        <p class="texto-comissao">A Comissão de Defesa dos Direitos do Consumidor zela pelos seus direitos enquanto consumidor, seja de serviços ou produtos. Ela se manifesta aos assuntos referentes à economia popular; à composição, qualidade, apresentação, publicidade e distribuição de bens e serviços; às relações de consumo e medidas de defesa do consumidor; e ao acolhimento e investigação de denúncias relacionados aos direitos do consumidor.<br/>
            Existem várias formas de entrar em contato com a comissão. Os atendimentos são feitos pelos canais do Alô Alerj ou presencialmente, na sala localizada no térreo do prédio da Alerj, na Rua da Alfândega, número 8. A comissão também vai até você por meio do Ônibus Itinerante, que faz rotas por todo o Estado. Para solicitar a presença do Ônibus da Defesa do Consumidor em seu bairro e conferir os itinerários já programados, <a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"><strong>clique aqui</strong></a>.</p>
    </div>

    @include('partials.rodape')

    @include('partials.scripts')
@stop
