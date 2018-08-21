<div class="card mt-4">
    <div class="card-header">
        {{ __('Contatos') }}

        {{--<a id="buttonContatos" href="{{ route('persons_contacts.create',['person_id' => $person->id]) }}"--}}
           {{--class="btn btn-primary btn-sm pull-right">--}}
            {{--<i class="fa fa-plus"></i>--}}
            {{--Novo Contato--}}
        {{--</a>--}}
        @include('callcenter.person_contacts.form-modal')
    </div>

    <div class="card-body">
        <table id="contactsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
</div>
