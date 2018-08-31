<div class="card-body">
    <table id="addressesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
        </tr>
        </thead>

        @forelse ($addresses as $address)
            <tr>
                <td><a href="{{ route('persons_addresses.show',['id' => $address->id]) }}">{{ $address->street }}</a></td>
                <td>{{$address->number}}</td>
                <td>{{$address->complement}}</td>
                <td>{{$address->neighbourhood}}</td>
                <td>{{$address->city}}</td>
            </tr>
        @empty
            <p>Nenhum Endereço encontrado</p>
        @endforelse
    </table>
    {{ $addresses->links() }}
</div>