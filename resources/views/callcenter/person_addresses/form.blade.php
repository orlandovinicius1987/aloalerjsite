@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Endereços') }}</div>

        <div class="card-body" id="vue-addresses">
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

            <form method="POST" action="{{ route('persons_addresses.store') }}" aria-label="{{ __('Endereços') }}">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($workflow))
                    <input name="workflow" type="hidden" value="{{ $workflow }}">
                @endif

                @if (isset($address))
                    <input name="address_id" type="hidden" value="{{ $address->id }}">
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
                    <label for="zipcode" class="col-sm-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                    <div class="col-md-6">
                        <input id="zipcode"
                               v-model="form.zipcode"
                               class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode"
                               value="{{is_null(old('zipcode')) ? $address->zipcode : old('zipcode')}}" required
                               autofocus
                               @keyup="typeKeyUp"
                               v-mask='["##.###-###"]'>

                        @if ($errors->has('zipcode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="street" class="col-sm-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                    <div class="col-md-6">
                        <input id="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"
                               v-model="form.street"
                               name="street" value="{{is_null(old('street')) ? $address->street : old('street')}}"
                               required
                               autofocus>

                        @if ($errors->has('street'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-sm-4 col-form-label text-md-right">{{ __('Número') }}</label>

                    <div class="col-md-2">
                        <input id="number" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                               v-model="form.number"
                               name="number" value="{{is_null(old('number')) ? $address->state : old('number')}}" required
                               autofocus>

                        @if ($errors->has('number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                        @endif
                    </div>


                    <label for="complement" class="col-sm-2 col-form-label text-md-right">{{ __('Complemento') }}</label>

                    <div class="col-md-2">
                        <input id="complement"
                               v-model="form.complement"
                               class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}"
                               name="complement"
                               value="{{is_null(old('complement')) ? $address->complement : old('complement')}}"
                               autofocus>

                        @if ($errors->has('complement'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('complement') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="form-group row">
                    <label for="neighbourhood" class="col-sm-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                    <div class="col-md-6">
                        <input id="neighbourhood"
                               v-model="form.neighborhood"
                               class="form-control{{ $errors->has('neighbourhood') ? ' is-invalid' : '' }}"
                               name="neighbourhood"
                               value="{{is_null(old('neighbourhood')) ? $address->neighbourhood : old('neighbourhood')}}"
                               required autofocus>

                        @if ($errors->has('neighbourhood'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('neighbourhood') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-sm-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                    <div class="col-md-4">
                        <input id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                               v-model="form.city"
                               name="city" value="{{is_null(old('city')) ? $address->city : old('city')}}" required
                               autofocus>

                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>

                    <label for="state" class="col-sm-1 col-form-label text-md-right">{{ __('Estado') }}</label>

                    <div class="col-md-1">
                        <input id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                               v-model="form.state"
                               name="state" value="{{is_null(old('state')) ? $address->state : old('state')}}" required
                               autofocus>

                        @if ($errors->has('state'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_mailable" class="col-sm-4 col-form-label text-md-right">{{ __('Endereço Validado')}}</label>
                    <div class="col-md-6">
                        <input type="hidden" name="is_mailable" value="0">
                        <input type="checkbox" name="is_mailable" {{old('send_answer_by_email') || $address->send_answer_by_email ? 'checked="checked"' : ''}} >
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            @if (isset($workflow) && $workflow)
                                {{ __('Próximo passo >>') }}
                            @else
                                {{ __('Gravar') }}
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
