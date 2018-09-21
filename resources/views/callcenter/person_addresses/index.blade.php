<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    <i class="fas fa-map-marked-alt"></i> Endereços
                </h5>
            </div>
            <div class="col-8 text-right">
                <a id="button-novo-endereco"
                   href="{{ route('people_addresses.create',['person_id' => $person->id]) }}"
                   class="btn btn-primary btn-sm pull-right btn-depth"
                >
                    <i class="fa fa-plus"></i> Novo Endereço
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('callcenter.person_addresses.partials.table')
    </div>


</div>


