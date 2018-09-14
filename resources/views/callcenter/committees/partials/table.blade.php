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
                    <td><a href="{{ route('committees.details',['id' => $committe->id]) }}">{{ $committe->name ?? '' }}</a></td>
                    <td>{{ $committe->short_name ?? '' }}</td>
                    <td>{{ $committe->phone ?? '' }}</td>
                    <td>{{ $committe->office_phone ?? '' }}</td>
                    <td>{{ $committe->president ?? '' }}</td>
                    <td>{{ $committe->vice_president ?? '' }}</td>
                    <td>{{ $committe->created_at ?? '' }}</td>
                </tr>
            @empty
                <p>Nenhum Protocolo encontrado</p>
            @endforelse
        </table>

        {{ $committees->links() }}
    </div>

