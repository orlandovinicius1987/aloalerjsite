@extends('contact.layout')

@section('content-main')

    <div class="mailsent mt-5">

        <div class="card my-5 py-3  col-lg-8 offset-lg-2 text-center">
            <div class="card-header pt-5">
                <div class="mensagem-enviada">
                    <h2>
                        {{ $name }}, </h2>
                    <h3>sua mensagem foi enviada com sucesso.
                    </h3>
                </div>
            </div>

            <div class="card-body pb-5">
                <h3>O número do seu protocolo é <span class="protocolo-numero">{{ $record->protocol }}</span>.</h3>
                <h3>Código de acesso <span class="codigo-acesso">{{ $record->access_code }}</span>.</h3>
                Guarde este código para consultar seu protocolo.<br>
                Agradecemos o seu contato. Retornaremos em breve.
            </div>
        </div>

    </div>


@stop
