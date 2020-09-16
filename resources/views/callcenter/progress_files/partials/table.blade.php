
<div class="card-body">
    <div class="card-body">
        <table id="filesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Visualizar</th>
                <th>Ícone</th>
                <th>Descrição</th>
            </tr>
            </thead>

            @forelse ($progressFiles as $progressFile)
                <tr>
                    <td>
                        <a href="{{ $progressFile->file->download_link }}">
                            Visualizar
                        </a>
                    </td>
                    <td>
                        <i class="{{$progressFile->file->icon ?? ''}}"></i>
                    </td>
                    <td>
                        {{ $progressFile->description ?? '' }}
                    </td>
                </tr>
            @empty
                <p>Nenhum anexo encontrado.</p>
            @endforelse
        </table>

        {{ $progressFiles instanceof \Illuminate\Contracts\Pagination\Paginator ? $progressFiles->links() : '' }}
    </div>
