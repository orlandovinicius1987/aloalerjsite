<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h5>
                    {{ __('Endereços') }}
                </h5>
            </div>

            <div class="col-8 text-right">
                <a id="buttonEndereços"
                   href="{{ route('persons_addresses.create',['person_id' => $person->id]) }}"
                   class="btn btn-primary btn-sm pull-right"
                >
                    <i class="fa fa-plus"></i> Novo Endereço
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="addressesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
    </div>
</div>
