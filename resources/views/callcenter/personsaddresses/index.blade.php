<div class="card-header">{{ __('Endereços') }}</div>

<div class="card-body">
    <table id="addressesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Endereço</th>
        </tr>
        </thead>
        @forelse ($addresses as $address)
        <tr>
            <td><a href="{{ route('personsAddresses.show',['id' => $address->id]) }}">{{ $address->id }}</a></td>
        </tr>
        @empty
        <p>Nenhum Endereço encontrado</p>
        @endforelse
    </table>

</div>

<a id="buttonEndereços" href="{{ route('personsAddresses.create',['person_id' => $person->id]) }}"
   class="btn btn-primary pull-right">
    <i class="fa fa-plus"></i>
    Novo Endereço
</a>
