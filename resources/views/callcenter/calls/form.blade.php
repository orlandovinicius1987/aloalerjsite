@extends('layouts.app')

@section('content')


<div class="card-header">{{ __('Reclamações') }}</div>
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

    <form method="POST" action="{{ route('calls.store') }}" aria-label="{{ __('Reclamações') }}">
        @csrf

        @if (isset($person))
        <input name="person_id" type="hidden" value="{{ $person->id }}">
        @endif

        @if (isset($workflow))
        <input name="workflow" type="hidden" value="{{ $workflow }}">
        @endif

        @if (isset($call))
        <input name="call_id" type="hidden" value="{{ $call->id }}">
        @endif

        <div class="form-group row">
            <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">{{ __('CNPJ/CPF') }}</label>
            <div class="col-md-6">
                <input id="cpf_cnpj" type="cpf_cnpj"
                       class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}" name="cpf_cnpj"
                       value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj')}}" readonly="readonly">
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
                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{is_null(old('name')) ? $person->name : old('name')}}" readonly="readonly">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="subject" class="col-sm-4 col-form-label text-md-right">{{ __('Assunto') }}</label>
            <div class="col-md-6">
                <input id="subject" type="subject"
                       class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject"
                       value="{{is_null(old('subject')) ? $call->subject : old('subject')}}" required autofocus>
                @if ($errors->has('subject'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="committee_id" class="col-sm-4 col-form-label text-md-right">{{ __('Comissão') }}</label>

            <div class="col-md-6">
                <select id="committee_id" type="committee_id"
                        class="form-control{{ $errors->has('committee_id') ? ' is-invalid' : '' }}" name="committee_id"
                        value="{{is_null(old('committee_id')) ? $call->committee_id : old('committee_id')}}" required
                        autofocus>
                    <option value="">SELECIONE</option>
                    @foreach ($committees as $key => $committe)
                    @if(((!is_null($call->id)) && (!is_null($call->committee_id) && $call->committee_id ===
                    $committe->id) || (!is_null(old('origins_id'))) && old('origins_id') == $committe->id))
                    <option value="{{ $committe->id }}" selected="selected">{{ $committe->name }}</option>
                    @else
                    <option value="{{ $committe->id }}">{{ $committe->name }}</option>
                    @endif
                    @endforeach
                </select>

                @if ($errors->has('origins_id'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('committee_id') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="call_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

            <div class="col-md-6">
                <select id="call_type_id" type="call_type_id"
                        class="form-control{{ $errors->has('call_type_id') ? ' is-invalid' : '' }}" name="call_type_id"
                        value="{{is_null(old('call_type_id')) ? $call->call_type_id : old('call_type_id')}}" required
                        autofocus>
                    <option value="">SELECIONE</option>
                    @foreach ($callTypes as $key => $callType)
                    @if(((!is_null($call->id)) && (!is_null($call->call_type_id) && $call->call_type_id ===
                    $callType->id) || (!is_null(old('call_type_id'))) && old('call_type_id') == $committe->id))
                    <option value="{{ $callType->id }}" selected="selected">{{ $callType->name }}</option>
                    @else
                    <option value="{{ $callType->id }}">{{ $callType->name }}</option>
                    @endif
                    @endforeach
                </select>

                @if ($errors->has('call_type_id'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('call_type_id') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="area_id" class="col-sm-4 col-form-label text-md-right">{{ __('Área') }}</label>

            <div class="col-md-6">
                <select id="area_id" type="area_id"
                        class="form-control{{ $errors->has('area_id') ? ' is-invalid' : '' }}" name="area_id"
                        value="{{is_null(old('area_id')) ? $call->area_id : old('area_id')}}" required autofocus>
                    <option value="">SELECIONE</option>
                    @foreach ($areas as $key => $area)
                    @if(((!is_null($call->id)) && (!is_null($call->area_id) && $call->area_id === $area->id) ||
                    (!is_null(old('area_id'))) && old('area_id') == $committe->id))
                    <option value="{{ $area->id }}" selected="selected">{{ $area->name }}</option>
                    @else
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endif
                    @endforeach
                </select>

                @if ($errors->has('area_id'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('area_id') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="original" class="col-sm-4 col-form-label text-md-right">{{ __('Solicitação') }}</label>
            <div class="col-md-6">
                <textarea id="original"
                          class="form-control{{ $errors->has('original') ? ' is-invalid' : '' }}"
                          name="original"
                          value="{{is_null(old('original')) ? $call->original : old('original')}}"
                          required rows="15">{{$call->original}}</textarea>
                @if ($errors->has('original'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('original') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="send_answer_by_email" class="col-sm-4 col-form-label text-md-right">{{ __('Resposta por e-mail')
                }}</label>
            <div class="col-md-6">
                <input id="send_answer_by_email" type="hidden" name="send_answer_by_email" value="0">
                <input id="send_answer_by_email" type="checkbox" name="send_answer_by_email" {{old('send_answer_by_email')
                || $call->send_answer_by_email ? 'checked="checked"' : ''}} >
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

@endsection
