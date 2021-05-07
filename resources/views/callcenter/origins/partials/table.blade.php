<table id="originsTable" class="table table-striped table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Ativo?</th>
    </tr>
    </thead>

        <tr v-for="origin in tables.origins">
            <td><a :href="'/callcenter/origins/show/' + origin.id">@{{ origin.name }}</a></td>
            <td v-if="origin.is_active">Sim</td>
            <td v-if="!origin.is_active">Não</td>
        </tr>
</table>

