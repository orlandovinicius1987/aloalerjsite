@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">
        Comissão de Defesa dos Direitos Humanos <br/>e Cidadania
        </h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')


    <div class="texto-comissao">
    <p>
        A Comissão de Defesa dos Direitos Humanos e Cidadania tem como tarefa acompanhar e se manifestar sobre proposições e assuntos ligados aos direitos inerentes ao ser humano, tendo em vista as condições mínimas à sua sobrevivência digna e ao exercício pleno de seus direitos e garantias individuais e coletivos.
    </p>
    <P>
        A Comissão também trata de assuntos que dizem respeito às políticas, programas e ações relacionadas ao direito à alimentação e nutrição como parte dos direitos Humanos.

    </p>
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Defesa dos Direitos Humanos e Cidadania',
        'telephone' => '0800 282 5108',
        'site' => '',
    ])
@stop

