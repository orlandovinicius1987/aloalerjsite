<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    Andamentos
                </h5>
            </div>

            @can('create-andamento')
                <div class="col-8 text-right">
                    <a id="buttonNovoAndamento" href="{{ route('progresses.create',['record_id' => $record->id]) }}"
                       class="btn btn-primary btn-sm pull-right btn-depth">
                        <i class="fa fa-plus"></i>
                        Novo Andamento
                    </a>
                </div>
            @endif
        </div>
    </div>

    @include('callcenter.progress.partials.table')
</div>
