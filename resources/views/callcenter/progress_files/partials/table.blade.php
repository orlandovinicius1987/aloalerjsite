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

    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h5>
                    Anexos pendentes de envio
                </h5>
            </div>
        </div>
    </div>

    <div class="hidden-lg">
        <div v-if="filesJson.length == 0" class="col-xs-12">
            Nenhum anexo pendente de envio.
        </div>
        <table class="table table-striped">
            <thead>
                <th>Ícone</th>
                <th>Descrição</th>
            </thead>
            <tbody>
                <tr v-if="filesJson.length > 0" class="col-xs-12" v-for="file in filesJson">
                        <td><i :class="file.icon"></i></td>
                        <td>@{{ file.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>