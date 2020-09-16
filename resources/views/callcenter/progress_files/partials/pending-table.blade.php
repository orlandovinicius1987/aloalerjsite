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
        <table v-else class="table table-striped">
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
