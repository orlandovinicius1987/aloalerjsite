@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Segurança Alimentar</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')
    <div class="texto-comissao">

        <P>
            A Comissão de Segurança Alimentar cuida para os alimentos comercializados estejam adequados para consumo, seguindo as normas de produção, transporte e armazenamento. <br>
            Compete à Comissão manifestar-se sobre:
            <ul>
                <li>A elaboração, coordenação e execução de programas e projetos ligados à segurança alimentar e combate à fome no Estado do Rio de Janeiro; </li>
                <li>Políticas, programas e ações relacionadas ao direito à alimentação e nutrição como parte integrante dos direitos humanos; </li>
                <li>Projetos e programas de geração de emprego e renda; </li>
                <li>Políticas públicas de assistência social; </li>
            </ul>
        </P>
        <P>
            A Comissão atua com o objetivo de:
            <ul>
                <li>Desenvolver estudos relacionados à garantia de alimentação e nutrição da população; </li>
                <li>Fiscalizar e acompanhar os programas, projetos e ações governamentais na área de segurança alimentar; </li>
                <li>Estudar e fiscalizar as ações das entidades da sociedade civil organizada voltadas para o combate à fome; </li>
                <li>Estimular ações da sociedade civil voltadas para o combate à fome no Estado do Rio de Janeiro; </li>
                <li>Realizar audiências públicas dentro e fora das dependências da Alerj para a discussão, estudo e recolhimento de sugestões que envolvam matérias relacionadas à sua competência; </li>
                <li>Promover e coordenar campanhas de conscientização da opinião pública, com vistas à união de esforços para a eliminação da fome no Estado do Rio de Janeiro; </li>
                <li>Promover e coordenar campanhas de conscientização quanto ao desperdício de alimentos. </li>
            </ul>
        </P>




    </div>


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'DSegurança Alimentar',
        'telephone' => '0800 282 0376',
        'site' => '',
    ])
@stop

