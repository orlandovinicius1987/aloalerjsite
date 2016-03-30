@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">
        Comissão de Tributação Controle da Arrecadação Estadual <br/>
        e de Fiscalização dos Tributos Estaduais
        </h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')


    <p class="texto-comissao">


        <P>A Comissão de Tributação, Controle da Arrecadação Estadual e de Fiscalização dos Tributos Estaduais trata dos assuntos referentes à tributação, arrecadação e fiscalização dos tributos estaduais.</P>
    <P>Cabe à Comissão</P>





    <ul>
        <li class="">Solicitar que o Tribunal de Contas do Estado promova inspeções e auditorias na arrecadação de tributos estaduais;</li>
        <li class="">Efetuar a tomada de contas do Governador;</li>
        <li class="">Examinar e emitir parecer sobre as contas anualmente apresentadas pelo Governador;</li>
        <li class="">Opinar sobre projetos de lei relativos ao plano plurianual, às diretrizes orçamentárias, ao orçamento anual e aos créditos adicionais;</li>
        <li class="">Exercer o acompanhamento e a fiscalização contábil, financeira, orçamentária, operacional e patrimonial do Estado e das entidades da administração direta e indireta, incluídas as sociedades e fundações instituídas e mantidas pelo Poder Público Estadual.</li>
        <li class="">Examinar e emitir parecer sobre os planos e programas estaduais, regionais e setoriais previstos na Constituição Estadual, após exame pelas demais comissões dos programas que lhes disserem respeito.</li>
        <li class="">Interpor representações e recursos das decisões do Tribunal de Contas, solicitando sustação de contrato impugnado ou outras providências a cargo da Assembleia Legislativa, elaborando, em caso de parecer favorável, o respectivo projeto de decreto legislativo.</li>
        <li class="">Opinar sobre representação e recursos de suas decisões;</li>
        <li class="">Requerer informações, relatórios, balanços e inspeções sobre as contas ou autorizações de despesas de órgãos e entidades da administração estadual, diretamente ou através do Tribunal de Contas do Estado;</li>
        <li class="">Opinar sobre quaisquer proposições de implicações orçamentárias, bem como empréstimos públicos, fixação de subsídios do Governador, do Vice-Governador do Estado e dos Deputados.</li>
    </ul>

        </p>


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Tributação e Controle da Arrecadação',
        'telephone' => '0800 282 3595',
        'site' => '',
    ])
@stop

