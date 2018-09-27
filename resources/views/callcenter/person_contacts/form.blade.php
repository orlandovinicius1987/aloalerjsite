@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="vue-contact-outside-workflow">
        <div class="card-header">
            <ul class="aloalerj-breadcrumbs">
                <li>
                    <a href="{{ route('people.show', ['id' => $person->id]) }}">{{ $person->name }}</a>
                </li>

                <li>Contatos</li>
            </ul>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('people_contacts.update') }}" aria-label="Contatos">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($contact))
                    <input name="contact_id" type="hidden" value="{{ $contact->id }}">
                @endif

                <div class="form-group row">
                    <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">CNPJ/CPF</label>

                    <div class="col-md-6">
                        <input id="cpf_cnpj"
                               class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}" name="cpf_cnpj"
                               value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj')}}"
                               readonly="readonly">

                        @if ($errors->has('cpf_cnpj'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cpf_cnpj') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">Nome Completo</label>

                    <div class="col-md-6">
                        <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" value="{{is_null(old('name')) ? $person->name : old('name')}}"
                               readonly="readonly">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{--{{dd($contact->contact_type_id,$contact->contact)}}--}}

                <div class="form-group row" >
                    <label for="mobile" class="col-sm-4 col-form-label text-md-right">Tipo de Contato</label>

                    <div class="col-md-6">
                        <input
                            id="contact_type_id"
                            name="contact_type_id"
                            v-model="currentContactType"
                            readonly="readonly"
                            type="hidden"
                        />
                        <select
                            id="contact_type_id_select"
                            name="contact_type_id_select"
                            v-model="currentContactType"
                            {{--v-init:current-contact-type="'{{is_null(old('contact_type_id')) ? $contact->contact_type_id : old('contact_type_id')}}'"--}}
                            class="select form-control{{ $errors->has('contact_type_id') ? ' is-invalid' : '' }} select2"
                            autofocus
                            required
                            disabled="disabled"
                        >
                            <option value="">SELECIONE</option>
                            @foreach ($contactTypes as $key => $contactType)
                                @if(((!is_null($contact->id)) && (!is_null($contact->contact_type_id) && $contact->contact_type_id == $contactType->id) || (!is_null(old('contact_type_id'))) && old('contact_type_id') == $contactType->id))
                                    <option value="{{ $contactType->id }}" selected="selected">{{ $contactType->name }}</option>
                                @else
                                    <option value="{{ $contactType->id }}">{{ $contactType->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('contact_type_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_type_id') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                  <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label text-md-right">Contato</label>
                    <div class="col-md-6">
                        <the-mask
                            v-if="this.currentContactType"
                            v-model="currentContact"
                            class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                            :mask="mask"
                            id="contact"
                            name="contact"
                            value=""
                            type="text"
                            masked="masked"
                            :tokens="tokens"
                            required
                            autofocus
                            @include('partials.disabled',['model'=>$contact])
                        ></the-mask>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="active" class="col-sm-4 col-form-label text-md-right">Contato Ativo</label>
                    <div class="col-md-6">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" {{old('active') || $contact->active ? 'checked="checked"' : ''}} @include('partials.disabled',['model'=>$contact])>
                    </div>
                </div>

                @if (!$workflow)
                    <div class="form-group row">
                        <label for="identification" class="col-sm-4 col-form-label text-md-right">
                            Criado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                   class="form-control"
                                   value="{{ $contact->created_at_formatted ?? '' }}"
                                   disabled
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="identification" class="col-sm-4 col-form-label text-md-right">
                            Alterado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                   class="form-control"
                                   value="{{ $contact->updated_at_formatted ?? '' }}"
                                   disabled
                            >
                        </div>
                    </div>
                @endif
                
                
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        @include('partials.edit-button',['model'=>$contact, 'form' =>'formRecords'])   
                        <button type="submit" class="btn btn-danger" @include('partials.disabled',['model'=>$contact])>
                            Gravar
                        </button>

                        <button id="cancelButton" class="btn btn-danger" v-on:click.prevent="cancel()"  :disabled="!(isEditing || isCreating)">
                            Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
