@if(isset($model) && ! is_null($model->id))
    <button
        type="button"
        v-on:click.prevent="editButton"
        class="btn btn-danger"
        id="vue-editButton"

        @can('committee-canEdit', $record->committee->id ?? '')
            :disabled="isEditing || isCreating"
        @else
            disabled
        @endcan
    >
        <i class="fas fa-pencil-alt"></i> Alterar
    </button>
@endif
