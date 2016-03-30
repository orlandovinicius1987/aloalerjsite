@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Defesa dos Direitos da Mulher</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')


    <div class="texto-comissao">
        <P>À Comissão de Defesa dos Direitos da Mulher compete se manifestar sobre as proposições referentes aos assuntos especificamente relacionados com a mulher, em especial os que tenham pertinência com os seus direitos.</P>

        <P>A ALERJ tem a luta pela igualdade entre os homens e fluminenses pois os representantes do Poder Legislativo sabem que embora esse direito esteja consagrado na Constituição Federal e de nosso estado ainda há muito que avançarmos no vida concreta onde ideias preconceituosas, sustentada pelo machismo e patrimonialismo, geram desigualdade nas relações de trabalho;atitudes de assédio sexual e moral nos ambientes escolares e profissionais, nos transportes e ambiente públicos. Isso sem falar da violência doméstica e ataques às mulheres que a cada 14 minutos geram uma vítima em nosso país!</P>

        <P>Foi por esse motivo que em 2005, a ALERJ criou seu DISQUE "SOS MULHER" NA ALERJ através de uma resolução votada por unanimidade pelos parlamentares. Na ocasião, o plenário foi unânime em afirmar que apesar dos grandes avanços que a mulher já vem obtendo na nossa sociedade, ainda é muito grande o seu desamparo e muito insatisfatório o atendimento das suas mais simples necessidades, fatos que impedem a plena fruição dos seus direitos de cidadãs. Desta forma a ALERJ estava se somando as ações não só nacionais, quanto internacionais em defesa dos Direitos da Mulher.</P>

        <P>A missão do  "SOS MULHER" - 0800 282 0119 - é prestar um serviço de acolhimento amigável às mulheres de todas as idades, crenças, orientações sexuais e escolaridade, que ligam buscando um socorro imediato ou pedindo informações sobre o que fazer para mudar sua realidade de carência ou ameaças de todos os tipos.</P>

        <P>Através de redes de atendimento, equipamentos e serviços jurídicos vocacionados para a temática, criados por políticas públicas e espaços de solidariedade conquistadas pelas mulheres nessas décadas de luta por respeito e igualdade, o SOS MULHER da ALERJ, que funciona de segunda a sexta, das 9h às 18h, com um atendimento especializado e feito apenas por mulheres já preparadas para esse fim, tem conseguido aconselhar e encaminhar centenas de cidadãs fluminenses.</P>

        <P>Mulher Fluminense, se você tiver algum problema use este instrumento que é SEU! conte com o SOS MULHER da ALERJ.</P>

    </div>



@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Defesa dos Direitos da Mulher',
        'site' => '',
        'telephone' => '0800 282 0119',
    ])
@stop

