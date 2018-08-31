<div class="card-body">

    <table id="progressesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Tipo de Andamento</th>
            <th>Origem</th>
            <th>Área</th>
            <th>Solicitação</th>
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
            </tr>
        @empty
            <p>Nenhum andamento encontrado.</p>
        @endforelse
    </table>
    {{ $progresses->links() }}
</div>