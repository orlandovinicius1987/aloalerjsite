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
                </tr>
            @empty
                <p>Nenhum arquivo encontrado.</p>
            @endforelse
        </table>

        {{ $progressFiles instanceof \Illuminate\Contracts\Pagination\Paginator ? $progressFiles->links() : '' }}
    </div>
