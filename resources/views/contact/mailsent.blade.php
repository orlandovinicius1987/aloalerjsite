@extends('contact.layout')

@section('content-main')
    <div class="spacer"></div>

    <div class="mailsent text-center">

        <div class="mensagem-enviada"><h2>{{ $name }}, sua mensagem foi enviada com sucesso.</h2></div>
        <div class="mensagem-agradecimento">Agradecemos o seu contato. Retornaremos em breve.</div>


    </div>
@stop
