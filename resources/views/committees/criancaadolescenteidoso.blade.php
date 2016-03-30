@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">
        Comissão de Assuntos da Criança do Adolescente e do Idoso
        </h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <div class="texto-comissao">
        A Comissão de Assuntos da Criança, do Adolescente e do Idoso trata de proposições referentes aos assuntos especificamente relacionados à criança, ao adolescente e ao idoso, em especial os que tenham pertinência com os seus direitos, bem como exercer ação fiscalizadora diante de fatos que atentem contra estes.
    </div>

@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
        'title' => 'Assuntos da Criança do Adolescente e do Idoso',
        'telephone' => '0800 282 9191',
        'site' => '',
    ])
@stop

