@extends('layouts.master')

@section('content-main')

    <div class="page-name">
        <h1 class="nome-pagina">Comissões</h1>
    </div>
    <div class="texto-pages">
        <p>O Alô Alerj é um canal de comunicação entre você e a Assembleia Legislativa do Estado do Rio de Janeiro (Alerj). Aqui você pode registrar reclamações, solicitações e sugestões sobre os temas tratados nas nossas comissões:</p>

        <div class="comissoes">
            @foreach($committees as $committee)
                <p><a href="/comissoes/{{$committee->slug}}">{{$committee->link_caption}}</a></p>
            @endforeach
        </div>
    </div>
@stop