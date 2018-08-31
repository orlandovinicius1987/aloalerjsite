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

            <form method="POST" action="{{ route('people_contacts.update') }}" aria-label="Contatos">
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
                    <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">CNPJ/CPF</label>

                    <div class="col-md-6">
                        <input id="cpf_cnpj"
                               class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}" name="cpf_cnpj"
                               value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
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
                               name="name" value="{{is_null(old('name')) ? $person->name : old('name') }}"
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
<<<<<<< HEAD
                            readonly="readonly"
                            type="hidden"
                        />
                        <select
                            id="contact_type_id_select"
                            name="contact_type_id_select"
                            v-model="currentContactType"
                            {{--v-init:current-contact-type="'{{is_null(old('contact_type_id')) ? $contact->contact_type_id : old('contact_type_id')}}'"--}}
=======
                            {{--v-init:current-contact-type="'{{is_null(old('contact_type_id')) ? $contact->contact_type_id : old('contact_type_id') }}'"--}}
>>>>>>> upstream/master
                            class="select form-control{{ $errors->has('contact_type_id') ? ' is-invalid' : '' }}"
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

                <div class="form-group row" v-if="mobileSelected">
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Celular</label>

                    <div class="col-md-6">
                        <input
                                name="contact"
                                id="contact"
                                v-mask='["(##)####-####", "(##)#####-####"]'
                                v-model="currentContact"
                                value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile') }}"
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
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Whatsapp</label>

                    <div class="col-md-6">
                        <input
                            name="contact"
                            id="contact"
                            v-mask='["(##)#####-####"]'
                            v-model="currentContact"
                            value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp') }}"
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
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">E-mail</label>

                    <div class="col-md-6">
                        <input
                               id="contact"
                               name="contact"
                               v-model="currentContact"
                               value="{{is_null(old('contact')) ? $contact->email : old('contact') }}"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               required
                               autofocus
                               type="email"
                        >

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row" v-if="phoneSelected">
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Telefone Fixo</label>

                    <div class="col-md-6">
                        <input
                            id="contact"
                            name="contact"
                            v-model="currentContact"
                            value="{{is_null(old('phone')) ? $contact->phone : old('phone') }}"
                            v-mask="['(##) ####-####']"
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


                <div class="form-group row" v-if="facebookSelected">
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Facebook</label>

                    <div class="col-md-6">
                        <input
                            id="contact"
                            name="contact"
                            v-model="currentContact"
                            value="{{is_null(old('facebook')) ? $contact->phone : old('facebook') }}"
                            class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                            required
                            autofocus
                        >

                        @if ($errors->has('facebook'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row" v-if="twitterSelected">
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Twitter</label>

                    <div class="col-md-6">
                        <input
                            id="contact"
                            name="contact"
                            value="{{is_null(old('twitter')) ? $contact->phone : old('twitter') }}"
                            class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                            required
                            autofocus
                        >

                        @if ($errors->has('twitter'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row" v-if="instagramSelected">
                    <label for="contact" class="col-sm-4 col-form-label text-md-right">Instagram</label>

                    <div class="col-md-6">
                        <input
                            id="contact"
                            name="contact"
                            value="{{is_null(old('instagram')) ? $contact->phone : old('instagram') }}"
                            class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                            required
                            autofocus
                        >

                        @if ($errors->has('instagram'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('instagram') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="active" class="col-sm-4 col-form-label text-md-right">Contato Ativo</label>
                    <div class="col-md-6">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" {{old('active') || $contact->active ? 'checked="checked"' : ''}} >
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            Gravar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
