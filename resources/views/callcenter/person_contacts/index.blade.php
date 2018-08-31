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

        @include('callcenter.person_contacts.partials.table')
</div>
