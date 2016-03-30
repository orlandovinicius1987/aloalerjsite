
    <div class="row">
        <div class="col-xs-9 col-sm-8 col-lg-12">
            <div class="chat-horario">Atendimento das 8h às 19h</div>
        </div>
        <div class="col-xs-2 col-sm-offset-1 col-sm-2">
            <span class="logo-chat-mobile visible-xs visible-sm"></span>
        </div>



    </div>
    <div class="row">

        <div class="col-sm-12">
            <form method="POST" action="{{ env('CHAT_CLIENT_URL') }}" class="form-vertical" accept-charset="UTF-8">
            <input name="clientId" type="hidden" value="{{ env('CHAT_CLIENT_ID') }}">
            <input name="layout" type="hidden" value="{{ env('CHAT_LAYOUT') }}">

            <div class="form-group">

                <input type="text" name="name" class="form-control" placeholder="Insira o seu nome">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Insira o seu email">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block iniciar-conversa">
                    Iniciar Conversa
                </button>
            </div>
            </form>
        </div>

    </div>



