<div class="card-body">
    <table id="contactsTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Tipo de Contato</th>
            <th>Contato</th>
            <th>Status</th>
        </tr>
        </thead>
        @forelse ($contacts as $contact)
            <tr>
                <td><a href="{{ route('people_contacts.show',['id' => $contact->id]) }}">{{ $contact->contactType->name }}</a></td>
                <td><a href="{{ route('people_contacts.show',['id' => $contact->id]) }}">{{ $contact->contact }}</a></td>
                @if($contact->active)
                    <td><span class="badge badge-success">{{$contact->active_string}}</span></td>
                @else
                    <td><span class="badge badge-danger">{{$contact->active_string}}</span></td>
                @endIf
            </tr>
        @empty
            <p>Nenhum Contato encontrado</p>
        @endforelse
    </table>
</div>