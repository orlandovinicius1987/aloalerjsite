@if(isset($model) && ! is_null($model->id))
    <button v-on:click="" class="btn btn-danger" id="editButton">
        Alterar
    </button>
@endif
