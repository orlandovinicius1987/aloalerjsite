<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    Anexos
                </h5>
            </div>

            <div class="col-8 text-right">
                <a id="button-novo-anexo" href="#" data-toggle="modal" data-target="#ProgressFilesModal"
                   class="btn btn-primary btn-sm pull-right btn-depth">
                    <i class="fa fa-plus"></i>
                    Novo Anexo
                </a>
            </div>
        </div>

        @include('callcenter.progress_files.partials.form-modal')

    </div>

    @if($record->id)
        @include('callcenter.progress_files.partials.table')
    @endIf
        @include('callcenter.progress_files.partials.pending-table')
</div>
