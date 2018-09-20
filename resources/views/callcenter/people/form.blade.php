@extends('layouts.app')

@section('content')


    <div class="mt-4" id="vue-personal-info">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <div class="section-title"><i class="fas fa-plus-circle"></i></i> Adicionar  / <i class="far fa-address-card"></i> Dados Pessoais </div>

                    {{--                    <div class="form-group row form-bigger">
                                            <div class="col-12"><input id="search" placeholder="Nome, CPF, CNPJ ou Protocolo" class="form-control"></div>
                                        </div>--}}


                    <form method="POST" action="{{ route('people.store') }}">
                        @csrf

                        @if (isset($person))
                            <input name="person_id" type="hidden" value="{{ $person->id }}">
                        @endif


                        <div class="form-group row form-bigger">
                            <div class="col-6">
                                <input id="cpf_cnpj" type="cpf_cnpj" placeholder="CNPJ / CPF"
                                       class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}"
                                       name="cpf_cnpj"
                                       value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
                                       required autofocus
                                       v-mask='["###.###.###-##", "##.###.###/####-##"]'
                                        {{$person->id ? 'disabled="disabled"' : '' }}
                                >

                                @if ($errors->has('cpf_cnpj'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf_cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-6">

                                <input id="identification" placeholder="RG"
                                       class="form-control{{ $errors->has('identification') ? ' is-invalid' : '' }}"
                                       name="identification"
                                       value="{{is_null(old('identification')) ? $person->identification : old('identification') }}"
                                       required autofocus
                                >

                                @if ($errors->has('identification'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('identification') }}</strong>
                            </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row form-bigger">
                            <div class="col-12">

                                <input id="name" placeholder="Nome Completo"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{is_null(old('name')) ? $person->name : old('name') }}"
                                       required autofocus
                                >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif

                            </div>
                        </div>

                        @if (!$workflow)
                            <div class="form-group row form-bigger text-left user-dates-alerts">
                                <div class="col-2 label">
                                    <i class="fas fa-user-plus"></i> Criado em
                                </div>

                                <div class="col-4">
                                    {{ $person->created_at_formatted ?? '' }}
                                </div>

                                <div class="col-2 label">
                                    <i class="fas fa-user-edit"></i> Alterado em
                                </div>

                                <div class="col-4">
                                    {{ $person->updated_at_formatted ?? '' }}
                                </div>

                            </div>
                        @endif

                        <div class="form-group text-center row">
                            <div class="col-12 text-center">
                                <button id="saveButton" type="submit" class="btn btn-danger btn-depth">
                                    @if ($workflow)
                                        Próximo passo >>
                                    @else
                                        Gravar
                                    @endif
                                </button>
                            </div>
                        </div>




                    </form>

                </div>
            </div>
        </div>

    </div>

{{--

    <div class="card mt-4" id="vue-personal-info">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-12">
                    <h5>Dados pessoais</h5>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('people.store') }}">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                <div class="form-group row">
                    <label for="cpf_cnpj" class="col-sm-2 col-form-label text-md-right">CNPJ/CPF</label>

                    <div class="col-sm-4">
                        <input id="cpf_cnpj" type="cpf_cnpj"
                               class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}"
                               name="cpf_cnpj"
                               value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
                               required autofocus
                               v-mask='["###.###.###-##", "##.###.###/####-##"]'
                                {{$person->id ? 'disabled="disabled"' : '' }}
                        >

                        @if ($errors->has('cpf_cnpj'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cpf_cnpj') }}</strong>
                            </span>
                        @endif
                    </div>

                    <label for="identification" class="col-sm-2 col-form-label text-md-right">
                        RG
                    </label>

                    <div class="col-sm-4">
                        <input id="identification"
                               class="form-control{{ $errors->has('identification') ? ' is-invalid' : '' }}"
                               name="identification"
                               value="{{is_null(old('identification')) ? $person->identification : old('identification') }}"
                               required autofocus
                        >

                        @if ($errors->has('identification'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('identification') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Nome Completo</label>

                    <div class="col-sm-10">
                        <input id="name"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" value="{{is_null(old('name')) ? $person->name : old('name') }}"
                               required autofocus
                        >

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @if (!$workflow)
                    <div class="form-group row">
                        <label for="identification" class="col-sm-2 col-form-label text-md-right">
                            Criado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                   class="form-control"
                                   value="{{ $person->created_at_formatted ?? '' }}"
                                   disabled
                                   disabled
                            >
                        </div>

                        <label for="identification" class="col-sm-2 col-form-label text-md-right">
                            Alterado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                   class="form-control"
                                   value="{{ $person->updated_at_formatted ?? '' }}"
                                   disabled
                            >
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-12 text-right">
                        <br>
                        <button id="saveButton" type="submit" class="btn btn-danger btn-depth">
                            @if ($workflow)
                                Próximo passo >>
                            @else
                                Gravar
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
--}}

    @if (isset($records))
        @include('callcenter.records.partials.table')
    @endif

    @if (isset($addresses))
        @include('callcenter.person_addresses.index')
    @endif

    @if (isset($contacts))
        @include('callcenter.person_contacts.index')
    @endif
@endsection

