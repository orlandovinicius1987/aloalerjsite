<div class="chat">
    <div id="comunicacao">
        <div class="infos">
            <p class="titulo-comissao">{{ $title }}</p>
            <div class="linha-info"></div>
            <div class="tel-comissao">{{ $telephone }}</div>
            <div class="linha-info"></div>
            {!! isset($site) ? $site : '' !!}
            <p class="outras-info">Atendimento das 8h às 20h</p>
        </div>
    </div>
</div>
