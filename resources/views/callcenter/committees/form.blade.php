@extends('layouts.app')

@section('content')

    <div id="vue-committees">
        <div class="row mt-4" >
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">

                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <h2>
                                <i class="fas fa-layer-group"></i> Comissões
                            </h2>
                        </li>
                        <li>
                            Criar nova Comissão
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-8 offset-lg-2 form-bigger">

                <form method="POST" action="{{ route('committees.store') }}" aria-label="Comissões" name="formCommittee" id="formCommittee" class="form-with-labels">
                    @csrf

                    @if (isset($committee))
                        <input name="id" type="hidden" value="{{ $committee->id }}">
                    @endif

                    <input name="slug" type="hidden" value="{{is_null(old('slug')) ? $committee->slug : old('slug') }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name" class="col-form-label">Nome</label>
                            <input id="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{is_null(old('name')) ? $committee->name : old('name') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="bio" class="col-form-label">Descrição</label>
                        <textarea id="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"
                                  name="bio"
                                @include('partials.disabled',['model'=>$committee])>{{is_null(old('bio')) ? $committee->bio : old('bio') }}</textarea>
                            @if ($errors->has('bio'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="phone" class="col-form-label">Telefone</label>
                            <input id="phone"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                   value="{{is_null(old('phone')) ? $committee->phone : old('phone') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="col-md-5">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input id="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{is_null(old('email')) ? $committee->email : old('email') }}"
                                   @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="president" class="col-form-label">Presidente</label>
                            <input id="president"
                                   class="form-control{{ $errors->has('president') ? ' is-invalid' : '' }}" name="president"
                                   value="{{is_null(old('president')) ? $committee->president : old('president') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('president'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('president') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="vice_president" class="col-form-label">Vice-Presidente</label>
                            <input id="vice_president"
                                   class="form-control{{ $errors->has('vice_president') ? ' is-invalid' : '' }}" name="vice_president"
                                   value="{{is_null(old('vice_president')) ? $committee->vice_president : old('vice_president') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('vice_president'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('vice_president') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="office_phone" class="col-form-label">Telefone do Gabinete</label>
                            <input id="office_phone"
                                   class="form-control{{ $errors->has('office_phone') ? ' is-invalid' : '' }}" name="office_phone"
                                   value="{{is_null(old('office_phone')) ? $committee->office_phone : old('office_phone') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('office_phone'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('office_phone') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="office_address" class="col-form-label">Endereço</label>
                            <input id="office_address"
                                   class="form-control{{ $errors->has('office_address') ? ' is-invalid' : '' }}" name="office_address"
                                   value="{{is_null(old('office_address')) ? $committee->office_address : old('office_address') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('office_address'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('office_address') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="slug" class="col-form-label">Slug (campo de controle da informática)</label>
                            <input id="slug"
                                   class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug"
                                   value="{{is_null(old('slug')) ? $committee->slug : old('slug') }}"
                                    @include('partials.disabled',['model'=>$committee])>
                            @if ($errors->has('slug'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-5 mb-0 text-center">
                        <div class="col-md-12">

                            @include('partials.previous-button')

                            @include('partials.edit-button',['model'=>$committee])

                            <button type="submit" class="btn btn-danger" @include('partials.disabled',['model'=>$committee]) id="save_button">
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

    <div class="col-lg-8 offset-lg-2 text-center">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-7 col-md-4">
                        <h3>
                            <i class="far fa-window-maximize"></i> Serviços
                        </h3>
                    </div>

                    <div class="col-12 col-md-8 text-right">
                        <a id="buttonNovaComissao" href="{{ route('committee_services.create',['id'=>$committee->id]) }}"
                           class="btn btn-primary btn-sm pull-right">
                            <i class="fa fa-plus"></i>
                            Novo Serviço
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('callcenter.committee_services.partials.table', ['committeeServices'=>$committee->committeeServices])
            </div>
        </div>
    </div>

@endsection
