    <!-- Modal -->
    <div class="modal fade" id="contactsModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="vue-contact-outside-workflow" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form" id="form_insertContact" name="form_insertContact" action="{{ route('people_contacts.insertContact') }}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}

                        <input name="person_id" type="hidden" value="{{ $person->id }}">

                        <div class="row">
                            <div class="col-md-5">
                                <p>Selecione o tipo de contato</p>
                                <select v-model="currentContactType" name="contact_type_id" class="select form-control select2" id="contact_type_id">
                                    <option value="" selected>SELECIONE</option>
                                    @foreach ($contactTypes as $key => $contactType)
                                        <option value="{{ $contactType->id }}">{{ $contactType->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-7">
                                <p>Contato</p>

                                <the-mask
                                    v-if="currentContactType"
                                    v-model="currentContact"
                                    class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                    :mask="mask"
                                    id="contact"
                                    name="contact"
                                    value=""
                                    type="text"
                                    masked="masked"
                                    :tokens="tokens"
                                    required
                                    autofocus
                                ></the-mask>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="saveButton" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="saveButton" type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
