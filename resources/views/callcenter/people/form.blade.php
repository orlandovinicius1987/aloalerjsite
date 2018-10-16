@extends('layouts.app')

@section('heading')
    @parent



    <div class="mt-4" id="vue-personal-info">
        <div class="row">
            <div class="col-md-8 offset-md-2 form-bigger">
                <div class="text-center">
                    <div class="section-title"><i class="fas fa-plus-circle"></i></i> Adicionar / <i class="far fa-address-card"></i> Dados Pessoais </div>

                    <form method="POST" action="{{ route('people.store') }}" >
                        @csrf

                        @if (isset($person))
                            <input name="person_id" type="hidden" value="{{ $person->id }}">
                        @endif

                        <div class="form-group row">
                            <div class="col-12 col-md-6 mobile-form-field">
                                <input id="cpf_cnpj" placeholder="CNPJ / CPF"
                                       class="form-control{{ $errors->getBag('validation')->has('cpf_cnpj') ? ' is-invalid' : '' }}"
                                       name="cpf_cnpj"
                                       value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
                                       required
                                       v-mask='["###.###.###-##", "##.###.###/####-##"]'
                                       {{$person->id ? 'disabled="disabled"' : '' }}
                                >

                                @if ($errors->getBag('validation')->has('cpf_cnpj'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('cpf_cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-12 col-md-6">
                                <input id="identification" placeholder="RG"
                                       class="form-control{{ $errors->getBag('validation')->has('identification') ? ' is-invalid' : '' }}"
                                       name="identification"
                                       value="{{is_null(old('identification')) ? $person->identification : old('identification') }}"
                                       required
                                >

                                @if ($errors->getBag('validation')->has('identification'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('identification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="name" placeholder="Nome Completo"
                                       class="form-control{{ $errors->getBag('validation')->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{is_null(old('name')) ? $person->name : old('name') }}"
                                       required
                                >

                                @if ($errors->getBag('validation')->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (!$workflow)
                            <div class="form-group row text-left user-dates-alerts">
                                <div class="col-4 col-md-2 label">
                                    <i class="fas fa-user-plus"></i> Criado em
                                </div>

                                <div class="col-8 col-md-4 text-left">
                                    {{ $person->created_at_formatted ?? '' }}
                                </div>

                                <div class="col-4 col-md-2 label">
                                    <i class="fas fa-user-edit"></i> Alterado em
                                </div>

                                <div class="col-8 col-md-4 text-left">
                                    {{ $person->updated_at_formatted ?? '' }}
                                </div>

                            </div>
                        @endif

                        <div class="form-group text-center row">
                            <div class="col-12 text-center">
                                <button id="saveButton" type="submit" class="btn btn-danger">
                                    @if ($workflow)
                                        Próximo passo  <i class="fas fa-forward"></i>
                                    @else
                                        <i class="far fa-save"></i> Gravar
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if (isset($records))
        @include('callcenter.records.partials.table')
    @endif

    @if (isset($addresses))
        @include('callcenter.person_addresses.index')
    @endif

    @if (isset($contacts))
        @include('callcenter.person_contacts.index')
    @endif
@stop
