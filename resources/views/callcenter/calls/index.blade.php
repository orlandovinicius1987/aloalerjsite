<div class="card-header">
    {{ __('Protocolos') }}

    <a id="buttonAndamentos"
       href="{{ route('calls.create',['person_id'=>$person->id]) }}"
       class="btn btn-primary btn-sm pull-right"
    >
        <i class="fa fa-plus"></i>
        Novo Protocolo
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table id="callsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Protocolos</th>
                    <th>Assuntos</th>
                    <th>Comissão</th>
                    <th>Tipo de Protocolo</th>
                    <th>Área</th>
                </tr>
            </thead>

            @forelse ($calls as $call)
                <tr>
                    <td><a href="{{ route('calls.show',['id' => $call->id]) }}">{{ $call->protocol_number }}</a></td>
                    <td>{{ $call->subject }}</td>
                    <td>{{ $call->committee->name }}</td>
                    <td>{{ $call->callType->name }}</td>
                    <td>{{ $call->area->name }}</td>
                </tr>
            @empty
                <p>Nenhumo Protocolo encontrada</p>
            @endforelse
        </table>
    </div>
</div>
