<div class="card-header">{{ __('Contatos') }}</div>

<div class="card-body">
    <table id="contactsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Contato</th>
        </tr>
        </thead>
        @forelse ($contacts as $contact)
        <tr>
            <td><a href="{{ route('personsContacts.show',['id' => $contact->id]) }}">{{ $contact->id }}</a></td>
        </tr>
        @empty
        <p>Nenhum Contato encontrado</p>
        @endforelse
    </table>

</div>
<a id="buttonContatos" href="{{ route('personsContacts.create',['person_id' => $person->id]) }}"
   class="btn btn-primary pull-right">
    <i class="fa fa-plus"></i>
    Novo Contato
</a>
