<div class="card-body" id="vue-contacts">
    <table id="contactsTable" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Tipo de Contato</th>
            <th>Contato</th>
            <th>Situação</th>
            <th>Criado em</th>
        </tr>
        </thead>
        @forelse ($contacts as $contact)
            <tr v-on:click='detail("{{route('people_contacts.show',['id' => $contact->id])}}")' style="cursor: pointer;">
                <td>{{ $contact->contactType->name }}</td>

                <td>{{ $contact->contact }}</td>

                <td>

                        @if($contact->active)
                            {{--<span class="badge badge-success">{{$contact->active_string}}</span>--}}
                        <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">{{$contact->active_string}}</span>
                        @else
                            {{--<span class="badge badge-danger">{{$contact->active_string}}</span>--}}
                                <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">{{$contact->active_string}}</span>
                        @endif

                </td>

                <td>{{ $contact->created_at_formatted ?? '' }}</td>
            </tr>
        @empty
            <p>Nenhum Contato encontrado</p>
        @endforelse
    </table>
</div>
