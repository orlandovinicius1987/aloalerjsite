@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="vue-committees">
        <div class="card-body">

            <form method="POST" action="{{ route('committees.store') }}" aria-label="Comissões" name="formCommittee" id="formCommittee" >
                @csrf

                @if (isset($committee))
                    <input name="id" type="hidden" value="{{ $committee->id }}">
                @endif

                <input name="slug" type="hidden" value="{{is_null(old('slug')) ? $committee->slug : old('slug') }}">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">Nome</label>
                    <div class="col-md-6">
                        <input id="name"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{is_null(old('name')) ? $committee->name : old('name') }}"
                               >
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">Nome Resumido</label>
                    <div class="col-md-6">
                        <input id="short_name"
                               class="form-control{{ $errors->has('short_name') ? ' is-invalid' : '' }}" name="short_name"
                               value="{{is_null(old('short_name')) ? $committee->short_name : old('short_name') }}"
                        >
                        @if ($errors->has('short_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('short_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-sm-4 col-form-label text-md-right">Descrição</label>
                    <div class="col-md-6">
                        <textarea id="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"
                               name="bio"
                        >{{is_null(old('bio')) ? $committee->bio : old('bio') }}</textarea>
                        @if ($errors->has('bio'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Telefone</label>
                    <div class="col-md-6">
                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                               id="phone"
                               value="{{is_null(old('phone')) ? $committee->phone : old('phone') }}"
                               autofocus
                               v-mask="['(##) ####-####', '(##) #####-####']"
                               v-model="form.phone"
                               v-init:mobile="'{{is_null(old('phone')) ? $committee->phone : old('phone') }}'"
                        >
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">E-mail</label>
                    <div class="col-md-6">
                        <input id="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{is_null(old('email')) ? $committee->email : old('email') }}"
                        >
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Aberta ao Público</label>
                    <div class="col-md-6">
                        <input type="hidden" name="public" value="0">
                        <input id="public" type="checkbox" name="public" {{old('public')
                        || $committee->public ? 'checked="checked"' : ''}} >
                        @if ($errors->has('public'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('public') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Presidente</label>
                    <div class="col-md-6">
                        <input id="president"
                               class="form-control{{ $errors->has('president') ? ' is-invalid' : '' }}" name="president"
                               value="{{is_null(old('president')) ? $committee->president : old('president') }}"
                        >
                        @if ($errors->has('president'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('president') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Vice-Presidente</label>
                    <div class="col-md-6">
                        <input id="vice_president"
                               class="form-control{{ $errors->has('vice_president') ? ' is-invalid' : '' }}" name="vice_president"
                               value="{{is_null(old('vice_president')) ? $committee->vice_president : old('vice_president') }}"
                        >
                        @if ($errors->has('vice_president'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('vice_president') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Telefone do Gabinete</label>
                    <div class="col-md-6">
                        <input id="office_phone"
                               autofocus
                               v-mask="['(##) ####-####', '(##) #####-####']"
                               class="form-control{{ $errors->has('office_phone') ? ' is-invalid' : '' }}" name="office_phone"
                               value="{{is_null(old('office_phone')) ? $committee->office_phone : old('office_phone') }}"
                        >
                        @if ($errors->has('office_phone'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('office_phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Endereço</label>
                    <div class="col-md-6">
                        <input id="office_address"
                               class="form-control{{ $errors->has('office_address') ? ' is-invalid' : '' }}" name="office_address"
                               value="{{is_null(old('office_address')) ? $committee->office_address : old('office_address') }}"
                        >
                        @if ($errors->has('office_address'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('office_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">

                        @include('partials.previous-button')

                        @include('partials.edit-button',['model'=>$committee])

                        <button type="submit" class="btn btn-danger">
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

@endsection
