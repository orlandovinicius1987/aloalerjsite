<div class="card">
    <div class="card-header">
        {{ __('Contatos') }}

        <a id="buttonContatos" href="{{ route('persons_contacts.create',['person_id' => $person->id]) }}"
           class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>
            Novo Contato
        </a>
    </div>

    <div class="card-body">
        <table id="contactsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Contato</th>
                </tr>
            </thead>
            @forelse ($contacts as $contact)
                <tr>
                    <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->id }}</a></td>
                    <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->contact }}</a></td>
                </tr>
            @empty
                <p>Nenhum Contato encontrado</p>
            @endforelse
        </table>

    </div>
</div>
