@extends('layouts.app')
@section('heading')
    @parent

    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <ul class="aloalerj-breadcrumbs">
                    <li>
                        <a href="{{ route('people.show', ['id' => $person->id]) }}">Nome: {{ $person->name }}</a>
                    </li>

                    <li>Contatos</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row" id="vue-contacts">
        <div class="col-lg-8 offset-lg-2 form-bigger">
            <form method="POST" action="{{ route('people_contacts.storeViaWorkflow') }}" aria-label="Contatos">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($contact))
                    <input name="contact_id" type="hidden" value="{{ $contact->id }}">
                @endif

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="cpf_cnpj" class="col-form-label">CNPJ/CPF</label>
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

                    <div class="col-md-8">
                        <label for="name" class="col-form-label">Nome Completo</label>
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

                @include('callcenter.person_contacts.partials.form-basic')

                <div class="form-group row mb-0 mt-5 text-center">
                    <div class="col-md-12">
                        <button id="saveButton" type="submit" class="btn btn-danger">
                            <i class="far fa-save"></i> Gravar
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
@section('content')

@stop
