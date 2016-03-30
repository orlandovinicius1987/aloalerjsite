@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">
        Comissão de Trabalho Legislação Social e Seguridade Social</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <div class="texto-comissao">
        A Comissão de Trabalho, Legislação Social e Seguridade Social zela para que os direitos trabalhistas sejam respeitados. Trata de proposições e projetos de lei relacionados às questões do trabalho, da previdência e da assistência social. Compete à Comissão promover estudos, pesquisas e integrações relacionados à atividade parlamentar e se manifestar em matérias relacionadas às políticas públicas de assistência social e aos projetos e programas de geração de emprego.
    </div>



@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Trabalho, Legislação Social e Seguridade Social',
        'telephone' => '0800 282 3596',
        'site' => '',
    ])
@stop

