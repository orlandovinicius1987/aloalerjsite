<div class="card-header">
    {{ __('Protocolos') }}
    @if(isset($person))
        <a id="buttonAndamentos"
           href="{{ route('records.create',['person_id'=>$person->id]) }}"
           class="btn btn-primary btn-sm pull-right"
        >
            <i class="fa fa-plus"></i>
            Novo Protocolo
        </a>
        @endif
</div>
@include('callcenter.records.table')
