<div class="card-header">{{ __('Reclamações') }}</div>

<div class="card-body">
    <table id="callsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Protocolos</th>
                <th>Assuntos</th>
            </tr>
        </thead>

        @forelse ($calls as $call)
            <tr>
                <td><a href="{{ route('calls.show',['id' => $call->id]) }}">{{ $call->id }}</a></td>
                <td>{{ $call->subject }}</td>
            </tr>
        @empty
            <p>Nenhuma Reclamação encontrada</p>
        @endforelse
    </table>
</div>

<a id="buttonAndamentos"
    href="{{ route('calls.create',['person_id'=>$person->id]) }}"
    class="btn btn-primary pull-right"
>
    <i class="fa fa-plus"></i>
    Nova Reclamação
</a>
