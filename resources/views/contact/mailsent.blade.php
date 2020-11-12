@extends('contact.layout')

@section('content-main')
    <div class="spacer"></div>

    <div class="mailsent text-center">

        <div class="mensagem-enviada"><h2>{{ $name }}, sua mensagem foi enviada com sucesso.</h2></div>
        <div class="mensagem-enviada"><h2>O número do seu protocolo é {{ $record->protocol }}.</h2></div>
        <div class="mensagem-enviada"><h2>Código de acesso {{ $record->access_code }}.</h2></div>
        <div class="mensagem-agradecimento">Guarde este código para consultar seu protocolo.</div>
        <div class="mensagem-agradecimento">Agradecemos o seu contato. Retornaremos em breve.</div>


    </div>
@stop
