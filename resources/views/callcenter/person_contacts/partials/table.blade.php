<div class="card-body">
    <table id="contactsTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Tipo de Contato</th>
            <th>Contato</th>
        </tr>
        </thead>
        @forelse ($contacts as $contact)
            <tr>
                <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->contactType->name }}</a></td>
                <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->contact }}</a></td>
            </tr>
        @empty
            <p>Nenhum Contato encontrado</p>
        @endforelse
    </table>
</div>