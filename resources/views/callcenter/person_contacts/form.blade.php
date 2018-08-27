@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="vue-contact-outside-workflow">
        <div class="card-header">
            <ul class="aloalerj-breadcrumbs">
                <li>
                    <a href="{{ route('persons.show', ['id' => $person->id]) }}">{{ $person->name }}</a>
                </li>

                <li>{{ __('Contatos') }}</li>
            </ul>
        </div>

        <div class="card-body" id="vue-contacts">
            @if (isset($message))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @if(session()->has('warning'))
                <div class="alert alert-warning">
                    {{ session()->get('warning') }}
                </div>
            @endif

            <form method="POST" action="{{ route('persons_contacts.store') }}" aria-label="{{ __('Contatos') }}">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($workflow) || old('workflow'))
                    <input name="workflow" type="hidden" value="{{ is_null(old('workflow')) ? $workflow : old('workflow') }}">
                @endif

                @if (isset($contact))
                    <input name="contact_id" type="hidden" value="{{ $contact->id }}">
                @endif

                <div class="form-group row">
                    <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">{{ __('CNPJ/CPF') }}</label>

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
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

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

                <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo de Contato') }}</label>
                    <div class="col-md-6">
                        <select
                            id="contact_type_id"
                            name="contact_type_id"
                            {{--v-model="currentContactType"--}}
                            class="select form-control{{ $errors->has('contact_type_id') ? ' is-invalid' : '' }}"
                            autofocus
                            required
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

                <div class="form-group row" v-if="mobileSelected">
                    <label for="whatsapp" class="col-sm-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                    <div class="col-md-6">
                        <input
                                name="contact"
                                id="contact"
                                v-mask='["(##)####-####", "(##)#####-####"]'
                                v-model="currentContact"
                                value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile')}}"
                                class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                autofocus
                                required
                        >

                        @if ($errors->has('whatsapp'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('whatsapp') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="form-group row" v-if="whatsappSelected">
                    <label for="whatsapp" class="col-sm-4 col-form-label text-md-right">{{ __('Whatsapp') }}</label>

                    <div class="col-md-6">
                        <input
                            name="contact"
                            id="contact"
                            v-mask='["(##)#####-####"]'
                            v-model="currentContact"
                            value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp')}}"
                            class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}"
                            autofocus
                            required
                        >

                        @if ($errors->has('whatsapp'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('whatsapp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row" v-if="emailSelected">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                    <div class="col-md-6">
                        <input type=email
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="contact"
                               id="contact"
                               value="{{is_null(old('contact')) ? $contact->email : old('contact')}}"
                               required
                               autofocus
                        >

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row" v-if="phoneSelected">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Telefone Fixo') }}</label>

                    <div class="col-md-6">
                        <input
                            name="phone"
                            id="phone"
                            value="{{is_null(old('phone')) ? $contact->phone : old('phone')}}"
                            v-mask="['(##) ####-####', '(##) #####-####']"
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            required
                            autofocus
                        >

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Gravar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
