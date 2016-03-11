@extends("chat.client.layouts.$layout.layout")

@section('contents')
    <div id="vue-client-chat">
        <!--Chat-->
        <div class="cabecalho-chat-home">
            <div class="linha-dourada-chat-home"></div>
            <div class="linha-azul-chat-home"></div>
            <div class="linha-sombra-home"></div>
            <div class="botao-voltar">
                <img src="{{ env('CHAT_ALOALERJ_BASE') }}/templates/mv/svg/voltar.svg" class="icone-voltar"/>
            </div>

            <div class="info-chat-home">
                <div v-if="chatInfo.responder.fullName" class="atendente-home">Atendente @{{ chatInfo.responder.fullName }}</div>
                <div v-if="! chatInfo.responder" class="atendente-home">AGUARDANDO ATENDENTE</div>
                {{--<div class="tempo-de-atendimento-home">visto há 2 minutos</div>--}}
            </div>

            <img src="{{ env('CHAT_ALOALERJ_BASE') }}/templates/mv/svg/balao-chat.svg" class="balao-chat-home"/>
            <a href="#" class="botao-sair" @click="__closeChat"><img src="{{ env('CHAT_ALOALERJ_BASE') }}/templates/mv/svg/x.svg"></a>
        </div>

        <div class="formato-chat">
            <div class="container-chat-home" id="chat">
                <div class="conversa-home">
                    <div class="dialogo" v-for="message in chatInfo.messages | orderBy 'serial'">
                        <div class="msn @{{ __chatLeftRight(message) }}">
                            <p>@{{{ message.message }}}</p>
                            <small class="time">@{{ __getChatTime(message) }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-chat">
                <div class="linha-sombra-input"></div>
                <div class="campos-input">
                    <input
                        id="btn-input"
                        type="text"
                        class="input-msn"
                        placeholder="Digite sua mensagem aqui..."
                        v-on:keyup.13="__sendMessage"
                        v-model="currentMessage"
                    />
                    <a href="#">
                        <div class="botao-enviar" @click="__sendMessage">Enviar</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery('#chat').bind('DOMSubtreeModified', function(e) {
            if (e.target.innerHTML.length > 0) {
                jQuery("html, body").animate(
                        {
                            scrollTop: jQuery(document).height()
                        },
                        "fast"
                );
            }
        });
    </script>
@stop

