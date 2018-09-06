<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    Protocolos

                    @if (isset($onlyNonResolved))
                        Não Resolvidos
                    @endif
                </h5>
            </div>

            <div class="col-8 text-right">
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
        </div>
    </div>

    <div class="card-body">
        <table id="recordsTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Protocolos</th>
                <th>Comissão</th>
                <th>Tipo de Protocolo</th>
                <th>Área</th>
                <th>Situação</th>
                <th>Criado em</th>
            </tr>
            </thead>

            @forelse ($records as $record)
                <tr>
                    <td><a href="{{ route('records.show',['id' => $record->id]) }}">{{ $record->protocol }}</a></td>
                    <td>{{ $record->committee->name ?? '' }}</td>
                    <td>{{ $record->recordType->name ?? '' }}</td>
                    <td>{{ $record->area->name ?? '' }}</td>
                    @if($record->active)
                    <td><span class="badge badge-success">{{$record->active_string}}</span></td>
                    @else
                        <td><span class="badge badge-danger">{{$record->active_string}}</span></td>
                    @endIf
                    <td>{{ $record->created_at_formatted ?? '' }}</td>
                </tr>
            @empty
                <p>Nenhum Protocolo encontrado</p>
            @endforelse
        </table>

        {{ $records->links() }}
    </div>
</div>
