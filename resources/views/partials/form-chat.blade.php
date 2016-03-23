<form method="POST" action="{{ env('CHAT_CLIENT_URL') }}" class="form-vertical" accept-charset="UTF-8">
    <input name="clientId" type="hidden" value="{{ env('CHAT_CLIENT_ID') }}">
    <input name="layout" type="hidden" value="{{ env('CHAT_LAYOUT') }}">

    <div class="form-group">
        <label for="input-nome" class="sr-only">Nome</label>
        <span class="logo-chat-mobile visible-xs visible-sm"></span>
        <input type="text" name="name" class="form-control" placeholder="Insira o seu nome">
    </div>
    <div class="form-group">
        <label for="input-email" class="sr-only">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Insira o seu email">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block iniciar-conversa">
            Iniciar Conversa
        </button>
    </div>
</form>
