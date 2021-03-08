<div class="card mt-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-4">
                <h5>
                    Anexos
                </h5>
            </div>

            <div class="col-8 text-right">
                <button id="button-novo-anexo" href="#" data-toggle="modal" data-target="#ProgressFilesModal"
                   class="btn btn-primary btn-sm pull-right btn-depth" @can('committee-canEdit', !is_null($progress->committee) ? $progress->record->committee->id : ($record->committee->id ?? '')) @include('partials.disabled',['model'=>$progress]) @else disabled @endcan>
                    <i class="fa fa-plus"></i>
                    Novo Anexo
            </button>
            </div>
        </div>

        @include('callcenter.progress_files.partials.form-modal')

    </div>

    @if($record->id)
        @include('callcenter.progress_files.partials.table')
    @endIf
        @include('callcenter.progress_files.partials.pending-table')
</div>
