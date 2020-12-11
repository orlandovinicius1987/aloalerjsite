@extends('layouts.app')

@section('content')

    <div id="vue-committees">
        <div class="row mt-4" >
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">

                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <h2>
                                <i class="fas fa-layer-group"></i> Assuntos
                            </h2>
                        </li>
                        <li>
                            Criar/Editar Assunto
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-8 offset-lg-2 form-bigger">

                <form method="POST" action="{{ route('areas.store') }}" aria-label="Assuntos" name="formArea" id="formArea" class="form-with-labels">
                    @csrf

                    @if (isset($area))
                        <input name="id" type="hidden" value="{{ $area->id }}">
                    @endif

                    <input name="slug" type="hidden" value="{{is_null(old('slug')) ? $area->slug : old('slug') }}">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label">Nome</label>
                            <input id="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{is_null(old('name')) ? $area->name : old('name') }}"
                                @include('partials.disabled',['model'=>$area])>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="is_active_checkbox" class="col-form-label">Ativo ?</label>
                            <p class="checkbox">
                                <input id="is_active" type="hidden" name="is_active" value="0">
                                <input id="is_active_checkbox" type="checkbox" name="is_active" {{old('is_active')
                                || $area->is_active ? 'checked="checked"' : ''}}>
                            </p>
                        </div>

                    </div>


                    <div class="form-group row mt-5 mb-0 text-center">
                        <div class="col-md-12">

                            @include('partials.previous-button')

                            @include('partials.edit-button',['model'=>$area])

                            <button type="submit" class="btn btn-danger" @include('partials.disabled',['model'=>$area]) id="save_button">
                                <i class="far fa-save"></i> Gravar
                            </button>

                            <button id="cancelButton" class="btn btn-danger" v-on:click.prevent="cancel()"  :disabled="!(isEditing || isCreating)">
                                Cancelar
                            </button>

                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
