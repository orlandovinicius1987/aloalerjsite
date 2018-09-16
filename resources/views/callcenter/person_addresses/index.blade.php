<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    Endereços
                </h5>
            </div>

            <div class="col-8 text-right">
                <a id="buttonNovoEndereco"
                   href="{{ route('people_addresses.create',['person_id' => $person->id]) }}"
                   class="btn btn-primary btn-sm pull-right"
                >
                    <i class="fa fa-plus"></i> Novo Endereço
                </a>
            </div>
        </div>
    </div>
    @include('callcenter.person_addresses.partials.table')
</div>
