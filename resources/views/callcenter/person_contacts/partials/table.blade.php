<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    {{ __('Contatos') }}
                </h5>
            </div>

            <div class="col-8 text-right">
                <a id="buttonContatos" href="#" data-toggle="modal" data-target="#contactsModal"
                   class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-plus"></i>
                    Novo Contato
                </a>
            </div>
        </div>

        @include('callcenter.person_contacts.form-modal')
    </div>

    <div class="card-body">
        <table id="contactsTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Tipo de Contato</th>
                    <th>Contato</th>
                    <th>Status</th>
                    <th>Criado em</th>
                </tr>
            </thead>
            @forelse ($contacts as $contact)
                <tr>
                    <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->contactType->name }}</a></td>
                    <td><a href="{{ route('persons_contacts.show',['id' => $contact->id]) }}">{{ $contact->contact }}</a></td>
                    @if($contact->active)
                        <td><span class="badge badge-success">{{$contact->active_string}}</span></td>
                    @else
                        <td><span class="badge badge-danger">{{$contact->active_string}}</span></td>
                    @endIf
                    <td>{{ $contact->created_at_formatted or '' }}</td>
                </tr>
            @empty
                <p>Nenhum Contato encontrado</p>
            @endforelse
        </table>
    </div>
</div>
