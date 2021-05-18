<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-6 col-md-8">
                <h3>
                    <i class="fas fa-map-marked-alt"></i> Endereços
                </h3>
            </div>
            @if(($person && !$person->is_anonymous))
                <div class="col-6 col-md-4 text-right">
                    <a id="button-novo-endereco"
                       href="{{ route('people_addresses.create',['person_id' => $person->id]) }}"
                       class="btn btn-primary btn-sm btn-block pull-right"
                        {{($person && $person->is_anonymous) ? 'disabled' : '' }}
                    >
                        <i class="fa fa-plus"></i> Novo Endereço
                    </a>
                </div>
            @endIf
        </div>
    </div>

    <div class="card-body">
        @include('callcenter.person_addresses.partials.table')
    </div>
</div>


