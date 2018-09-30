@extends('layouts.app')



@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <ul class="aloalerj-breadcrumbs">
                <li>
                    <a href="{{ route('people.show', ['id' => $person->id]) }}">Nome: {{ $person->name }}</a>
                </li>

                <li>Contatos</li>
            </ul>
        </div>

        <div class="card-body" id="vue-contacts">

            <form method="POST" action="{{ route('people_contacts.storeViaWorkflow') }}" aria-label="Contatos">
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
                               value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
                               readonly="readonly"
                        >

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
                               readonly="readonly"
                        >

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label text-md-right">Celular</label>

                    <div class="col-md-6">
                        <input class="form-control{{ $errors->getBag('validation')->has('mobile') ? ' is-invalid' : '' }}"
                               id="mobile"
                               name="mobile"
                               value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile') }}" autofocus
                               v-mask='["(##)####-####", "(##)#####-####"]'
                               v-model='form.mobile'
                               v-init:mobile="'{{is_null(old('mobile')) ? $contact->mobile : old('mobile')}}'"
                        >

                        @if ($errors->getBag('validation')->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="whatsapp" class="col-sm-4 col-form-label text-md-right">Whatsapp</label>

                    <div class="col-md-6">
                        <input class="form-control{{ $errors->getBag('validation')->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp"
                               id="whatsapp"
                               value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp') }}"
                               autofocus
                               v-mask='["(##)#####-####"]'
                               v-model='form.whatsapp'
                               v-init:whatsapp="'{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp')}}'"
                        >

                        @if ($errors->getBag('validation')->has('whatsapp'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('whatsapp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-mail</label>

                    <div class="col-md-6">
                        <input type=email class="form-control{{ $errors->getBag('validation')->has('email') ? ' is-invalid' : '' }}" name="email"
                               id="email"
                               value="{{is_null(old('email')) ? $contact->email : old('email') }}"
                               autofocus>

                        @if ($errors->getBag('validation')->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label text-md-right">Telefone Fixo</label>

                    <div class="col-md-6">
                        <input class="form-control{{ $errors->getBag('validation')->has('phone') ? ' is-invalid' : '' }}" name="phone"
                               id="phone"
                               value="{{is_null(old('phone')) ? $contact->phone : old('phone') }}"
                               autofocus
                               v-mask="['(##) ####-####', '(##) #####-####']"
                               v-model='form.phone'
                               v-init:phone="'{{is_null(old('phone')) ? $contact->phone : old('phone')}}'"
                        >

                        @if ($errors->getBag('validation')->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button id="saveButton" type="submit" class="btn btn-danger">
                            <i class="far fa-save"></i> Gravar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
