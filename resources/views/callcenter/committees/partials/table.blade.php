    <div class="card-body">
        <table id="recordsTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Nome Resumido</th>
                <th>Telefone</th>
                <th>Telefone Gabinete</th>
                <th>President</th>
                <th>Vice-President</th>
                <th>Criado em</th>
            </tr>
            </thead>

            <tr v-for="committee in tables.committees">
                <td><a :href="'/callcenter/committees/show/' + committee.id">@{{ committee.name }}</a></td>
                <td>@{{ committee.short_name  }}</td>
                <td>@{{ committee.phone  }}</td>
                <td>@{{ committee.office_phone  }}</td>
                <td>@{{ committee.president  }}</td>
                <td>@{{ committee.vice_president  }}</td>
                <td>@{{ committee.created_at  }}</td>
            </tr>
    </div>

