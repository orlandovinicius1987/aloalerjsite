<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    <i class="fas fa-list-ol"></i> Protocolos

                    @if (isset($onlyNonResolved))
                        Não Resolvidos
                    @endif
                </h5>
            </div>
            <div class="col-8 text-right">
                @if(isset($person))
                    <a id="button-novo-protocolo"
                       href="{{ route('records.create',['person_id'=>$person->id]) }}"
                       class="btn btn-primary btn-sm pull-right btn-depth"
                    >
                        <i class="fa fa-plus"></i>
                        Novo Protocolo
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body">
            <table id="recordsTable" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Protocolos</th>
                    @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                    <th>Nome</th>
                    @endif
                    <th>Comissão</th>
                    <th>Tipo de Protocolo</th>
                    <th>Área</th>
                    <th>Situação</th>
                    <th>Criado em</th>
                </tr>
                </thead>

                @forelse ($records as $record)
                    <tr>
                        <td><a href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a></td>

                        @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                        <td>
                            <a href="{{ route('people.show',['id' => $record->person->id]) }}" >{{ $record->person->name }}</a>
                        </td>
                        @endif

                        <td>{{ $record->committee->name ?? '' }}</td>

                        <td>{{ $record->recordType->name ?? '' }}</td>

                        <td>{{ $record->area->name ?? '' }}</td>

                        <td>
                            <h4>
                                @if($record->resolved_at)
                                    <span class="badge badge-danger">Finalizado</span>
                                @else
                                    <span class="badge badge-success">Em aberto</span>
                                    @endIf
                            </h4>
                        </td>

                        <td>{{ $record->created_at_formatted ?? '' }}</td>
                    </tr>
                @empty
                    <p>Nenhum Protocolo encontrado</p>
                @endforelse
            </table>

            {{ $records->links() }}
        </div>
    </div>
</div>

