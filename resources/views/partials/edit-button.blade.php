@if(isset($model) && ! is_null($model->id))
    <button v-on:click="alert('Oi')" class="btn btn-danger" id="vue-editButton">
        Alterar
    </button>
@endif
