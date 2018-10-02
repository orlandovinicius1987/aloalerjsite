    <div class="card-body">

        <div class="hidden-lg">
            <div class="row">
                Anexos pendentes de envio
            </div>
                <div v-if="filesJson.length == 0" class="col-xs-12">
                    Nenhum arquivo anexado
                </div>
                <div v-if="filesJson.length > 0" class="col-xs-12" v-for="file in filesJson">
                            <div class="row">
                                <div class="col-xs-3">
                                    <strong>Id do arquivo</strong>&nbsp
                                </div>
                                <div class="col-xs-9">
                                    @{{ file.file_id }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3">
                                    <strong>Descrição</strong>&nbsp
                                </div>
                                <div class="col-xs-9">
                                    @{{ file.description }}
                                </div>
                </div>
            </div>
        </div>


        <table id="filesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Visualizar</th>
                    <th>Descrição</th>
                </tr>
            </thead>

            @forelse ($progressFiles as $progressFile)
                <tr>
                    <td>
                        <a href="{{ $progressFile->download_link }}">
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
