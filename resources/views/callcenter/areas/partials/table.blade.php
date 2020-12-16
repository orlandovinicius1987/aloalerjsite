<table id="areasTable" class="table table-striped table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Ativo?</th>
    </tr>
    </thead>

        <tr v-for="area in tables.areas">
            <td><a :href="'/callcenter/areas/show/' + area.id">@{{ area.name }}</a></td>
            <td v-if="area.is_active">Sim</td>
            <td v-if="!area.is_active">Não</td>
        </tr>
</table>

