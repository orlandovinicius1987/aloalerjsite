<table id="recordsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Protocolos</th>
        <th>Assuntos</th>
        <th>Comissão</th>
        <th>Tipo de Protocolo</th>
        <th>Área</th>
    </tr>
    </thead>

    @forelse ($records as $record)
        <tr>
            <td><a href="{{ route('records.show',['id' => $record->id]) }}">{{ $record->protocol }}</a></td>
            <td>{{ $record->subject }}</td>
            <td>{{ $record->committee->name or '' }}</td>
            <td>{{ $record->recordType->name or '' }}</td>
            <td>{{ $record->area->name or '' }}</td>
        </tr>
    @empty
        <p>Nenhum Protocolo encontrado</p>
    @endforelse
</table>
@if(method_exists($records,'links'))
    {{ $records->links() }}
@endif
