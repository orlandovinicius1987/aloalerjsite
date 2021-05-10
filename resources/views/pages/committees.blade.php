@extends('layouts.master')

@section('content-main')

    <div class="page-name">
        <h1 class="nome-pagina mb-5 mt-5">Comissões</h1>

    </div>
    <div class="texto-pages">
        <p>O Alô Alerj é um canal de comunicação entre você e a Assembleia Legislativa do Estado do Rio de Janeiro (Alerj). Aqui você pode registrar reclamações, solicitações e sugestões sobre os temas tratados nas nossas comissões:</p>


        <div class="row comissoes mt-4" data-masonry='{"percentPosition": true }' >
            @foreach($committeeServices as $committeService)
                <div class="col-sm-12 col-lg-4 mb-4"  >
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="label-contato"><strong>
                                    <a href="{{ route('services.show', ['id'=>$committeService->id]) }}">{{$committeService->link_caption}}</a>
                                </strong></p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@stop
