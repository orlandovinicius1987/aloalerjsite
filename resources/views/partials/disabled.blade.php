    @if(!is_null($model->id))
        :disabled="!isEditing && !isCreating"
    @endif

