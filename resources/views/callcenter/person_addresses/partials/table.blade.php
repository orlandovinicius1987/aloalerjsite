<div class="card-body" id="vue-addresses">
    <table id="addressesTable" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Situação</th>
            <th>Criado em</th>
        </tr>
        </thead>

        @forelse ($addresses as $address)
            <tr v-on:click='detail("{{route('people_addresses.show', ['id' => $address->id])}}")' style="cursor: pointer;">
                <td>{{ $address->street }}</td>

                <td>{{$address->number}}</td>

                <td>{{$address->complement}}</td>

                <td>{{$address->neighbourhood}}</td>

                <td>{{$address->city}}</td>

                <td>
                    @if($address->active)
                        {{--<span class="badge badge-success">{{$address->active_string}}</span>--}}
                        <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">{{$address->active_string}}</span>
                    @else
                        {{--<span class="badge badge-danger">{{$address->active_string}}</span>--}}
                        <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">{{$address->active_string}}</span>
                    @endif
                </td>

                <td>{{ $address->created_at_formatted ?? '' }}</td>
            </tr>
        @empty
            <p>Nenhum Endereço encontrado</p>
        @endforelse
    </table>
</div>

{{ $addresses->links() }}

