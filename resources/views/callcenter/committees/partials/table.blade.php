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

            @forelse ($committees as $committe)
                <tr>
                    <td><a href="{{ route('committees.details',['id' => $committe->id]) }}">{{ $committe->name or '' }}</a></td>
                    <td>{{ $committe->short_name or '' }}</td>
                    <td>{{ $committe->phone or '' }}</td>
                    <td>{{ $committe->office_phone or '' }}</td>
                    <td>{{ $committe->president or '' }}</td>
                    <td>{{ $committe->vice_president or '' }}</td>
                    <td>{{ $committe->created_at or '' }}</td>
                </tr>
            @empty
                <p>Nenhum Protocolo encontrado</p>
            @endforelse
        </table>

        {{ $committees->links() }}
    </div>

