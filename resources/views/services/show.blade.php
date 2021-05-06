@extends('layouts.master')

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop




@section('content-main')

    <div class="page-name text-center">
        <h1 class="nome-comissao ">{{ $committeeService->committee->name ?? '' }}</h1>
    </div>

    <h1 class="display-5 text-center comissoes-telefone mb-5 mt-4">
        @include('partials.committee-telephone', [
        'title' => '',
        'telephone' => $committeeService->phone,
        'site' => '',
    ])
    </h1>


{{--

    <div class="comissoes-telefone text-center">
        @include('partials.committee-telephone', [
            'title' => '',
            'telephone' => $committeeService->phone,
            'site' => '',
        ])
    </div>
--}}

    <div class="ficha-comissao text-center row mb-4 mt-4">
        <div class="comissao_presidente mb-4 col-lg-6 ">
            <div class="card pt-5 pb-5 ">
                <h5>
                    Presidente
                </h5>

                <h3>
                {!! $committeeService->committee->president !!}
                </h3>

            </div>
        </div>

        <div class="comissao-secretario mb-4 col-lg-6">
            <div class="card pt-5 pb-5">
                <h5>
                    Vice-Presidente
                </h5>
                <h3>
                    {!! $committeeService->committee->vice_president !!}
                </h3>

            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-8">
            <div class="texto-comissao">
                {!! $committeeService->bio !!}
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card ficha-comissao text-center  pt-5 pb-5">
                <div class="comissao-dados">
                    <div class="comissao-telefones mb-4">
                        <span class="comissao-outrostelefones">Outros telefones:</span><br>
                        {!! $committeeService->committee->office_phone ?? '' !!}
                    </div>

                    @if($committeeService->email)
                        <b>
                            <div class="comissao-email">{{--<span class="emails">E-mail:</span><br>--}}
                                {!! $committeeService->email !!}
                            </div>
                        </b>
                    @endif
                </div>
            </div>
        </div>

    </div>





@stop


