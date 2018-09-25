@if(isset($model) && ! is_null($model->id))
    <button  type="button" v-on:click="editButton" class="btn btn-danger" id="vue-editButton" :disabled="isEditing || isCreating">
        Alterar
    </button>
        
    
@endif
