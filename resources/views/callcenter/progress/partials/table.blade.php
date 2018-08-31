<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    {{ __('Andamentos') }}
                </h5>
            </div>

            <div class="col-8 text-right">
                <a id="buttonEndereços" href="{{ route('progresses.create',['record_id' => $record->id]) }}"
                   class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-plus"></i>
                    Novo Andamento
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">

        <table id="progressesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Tipo de Andamento</th>
                <th>Origem</th>
                <th>Área</th>
                <th>Solicitação</th>
                <th>Criado em</th>
            </tr>
            </thead>

            @forelse ($progresses as $progress)
                <tr>
                    <td>
                        <a href="{{ $progress->link }}">
                            {{ $progress->progressType->name ?? '' }}
                        </a>
                    </td>
                    <td>
                        {{ $progress->origin->name ?? '' }}
                    </td>
                    <td>
                        {{ $progress->area->name ?? '' }}
                    </td>
                    <td>
                        {{ $progress->original }}
                    </td>
                    <td>{{ $progress->created_at_formatted or '' }}</td>
                </tr>
            @empty
                <p>Nenhum andamento encontrado.</p>
            @endforelse
        </table>
        {{ $progresses->links() }}
    </div>
</div>
