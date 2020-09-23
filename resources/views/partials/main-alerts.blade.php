@if(now() > \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2020-09-23 14:00:00') && now() < \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2020-09-24 00:00:00'))
    <div class="alert alert-warning" role="alert">
        <h4>Nosso sistema encontra-se temporariamente em manutenção. Favor retornar o contato amanhã (24/09/2020).</h4>
    </div>
@endIf
