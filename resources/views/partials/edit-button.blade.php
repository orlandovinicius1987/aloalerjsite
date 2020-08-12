@if(isset($model) && ! is_null($model->id))
    <button
        type="button"
        v-on:click.prevent="editButton"
        class="btn btn-danger"
        id="vue-editButton"
        @if(isset($record))
            @can('committee-canEdit', $record->committee->id ?? '')
                :disabled="isEditing || isCreating"
            @else
                disabled
            @endcan
        @else
                :disabled="isEditing || isCreating"
        @endIf

    >
        <i class="fas fa-pencil-alt"></i> Alterar
    </button>
@endif
