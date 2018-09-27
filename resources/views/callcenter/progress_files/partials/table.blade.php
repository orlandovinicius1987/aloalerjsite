    <div class="card-body">

        <table id="progressesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Visualizar</th>
                    <th>Descrição</th>
                </tr>
            </thead>

            @forelse ($progressFiles as $progressFile)
                <tr>
                    <td>
                        <a href="{{ $progressFile->link }}">
                            Visualizar
                        </a>
                    </td>

                    <td>
                        {{ $progressFile->description ?? '' }}
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

        {{ $progressFiles instanceof \Illuminate\Contracts\Pagination\Paginator ? $progressFiles->links() : '' }}
    </div>
