@extends('layouts.master')

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop




@section('content-main')
    <div class="page-name">
        <h1 class="nome-comissao ">{{ $committeeService->committee->name ?? '' }}</h1>
    </div>


    <div class="comissoes-telefone">

        @include('partials.committee-telephone', [
            'title' => '',
            'telephone' => $committeeService->phone,
            'site' => '',
        ])
    </div>



    <div class="texto-comissao">
        {!! $committeeService->bio !!}
    </div>


    <div class="ficha-comissao text-center">
        <div class="comissao-dados">
            <div class="comissao-telefones"><span class="comissao-outrostelefones">Outros telefones:</span>{!! $committeeService->committee->office_phone ?? '' !!}</div>
            @if($committeeService->email)
                <b><div class="comissao-email"><span class="emails">E-mail:</span>{!! $committeeService->email !!}</div></b>
            @endif
        </div>
    </div>
@stop


