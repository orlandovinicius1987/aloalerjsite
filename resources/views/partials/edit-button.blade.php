@if(isset($model) && ! is_null($model->id))
    <button v-on:click="alert('Oi')" class="btn btn-danger btn-depth" id="vue-editButton">
        Alterar
    </button>
@endif
