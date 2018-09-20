    <div class="card-body">

        <table id="progressesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Tipo de Andamento</th>
                    <th>Origem</th>
                    <th>Área</th>
                    <th>Solicitação</th>
                    <th>Finalizador</th>
                    <th>Notificação</th>
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

                    <td class="text-center">
                        @if ($progress->record->resolve_progress_id == $progress->id)
                            @if($progress->finalize)
                                <h5><span class="badge badge-success">Sim</span></h5>
                            @endif
                        @else
                            <h5><span class="badge badge-danger">Não</span></h5>
                        @endif
                    </td>

                    <td class="text-center">
                        @if ($progress->email_sent_at)
                            <h5>
                                <span class="badge badge-success">
                                    E-mail
                                </span>
                            </h5>
                        @endif
                    </td>

                    <td>{{ $progress->created_at_formatted ?? '' }}</td>
                </tr>
            @empty
                <p>Nenhum andamento encontrado.</p>
            @endforelse
        </table>

        {{ $progresses instanceof \Illuminate\Contracts\Pagination\Paginator ? $progresses->links() : '' }}
    </div>
