@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <ul class="aloalerj-breadcrumbs">
                <li>
                    <a href="{{ route('persons.show', ['id' => $person->id]) }}">
                        {{ $person->name }}
                    </a>
                </li>

                <li>Protocolo {{ $record->protocol }}</li>
            </ul>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

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

            <form method="POST" action="{{ route('records.store') }}" aria-label="{{ __('Protocolos') }}">
                @csrf

                @if (isset($person))
                <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($workflow) || old('workflow'))
                    <input name="workflow" type="hidden" value="{{ is_null(old('workflow')) ? $workflow : old('workflow') }}">
                @endif

                @if (isset($record))
                <input name="record_id" type="hidden" value="{{ $record->id }}">
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

                @if (isset($record) and is_null($record->id))
                    <div class="form-group row">
                        <label for="committee_id" class="col-sm-4 col-form-label text-md-right">{{ __('Origem') }}</label>

                        <div class="col-md-6">
                            <select id="committee_id" type="origin_id"
                                    class="form-control{{ $errors->has('origin_id') ? ' is-invalid' : '' }}" name="origin_id"
                                    value="{{is_null(old('origin_id')) ? $record->origin_id : old('origin_id')}}" required
                                    autofocus>
                                <option value="">SELECIONE</option>
                                @foreach ($origins as $key => $origin)
                                    @if(((!is_null($record->id)) && (!is_null($record->origin_id) && $record->origin_id === $origin->id) || (!is_null(old('origin_id'))) && old('origin_id') == $origin->id))
                                        <option value="{{ $origin->id }}" selected="selected">{{ $origin->name }}</option>
                                    @else
                                        <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('origins_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('origin_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                @endIf

                <div class="form-group row">
                    <label for="committee_id" class="col-sm-4 col-form-label text-md-right">{{ __('Comissão') }}</label>

                    <div class="col-md-6">
                        <select id="committee_id" type="committee_id"
                                class="form-control{{ $errors->has('committee_id') ? ' is-invalid' : '' }}"
                                name="committee_id"
                                value="{{is_null(old('committee_id')) ? $record->committee_id : old('committee_id')}}"
                                required
                                autofocus>
                            <option value="">SELECIONE</option>
                            @foreach ($committees as $key => $committe)
                                @if(((!is_null($record->id)) && (!is_null($record->committee_id) && $record->committee_id === $committe->id) || (!is_null(old('committee_id'))) && old('committee_id') == $committe->id))
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
                    <label for="record_type_id" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                    <div class="col-md-6">
                        <select id="record_type_id"
                                class="form-control{{ $errors->has('record_type_id') ? ' is-invalid' : '' }}"
                                name="record_type_id"
                                value="{{is_null(old('record_type_id')) ? $record->record_type_id : old('record_type_id')}}"
                                required
                                autofocus>
                            <option value="">SELECIONE</option>
                            @foreach ($recordTypes as $key => $recordType)
                                @if(((!is_null($record->id)) && (!is_null($record->record_type_id) && $record->record_type_id === $recordType->id) || (!is_null(old('record_type_id'))) && old('record_type_id') == $recordType->id))
                                    <option value="{{ $recordType->id }}" selected="selected">{{ $recordType->name }}</option>
                                @else
                                    <option value="{{ $recordType->id }}">{{ $recordType->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('record_type_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('record_type_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="area_id" class="col-sm-4 col-form-label text-md-right">{{ __('Área') }}</label>

                    <div class="col-md-6">
                        <select id="area_id" type="area_id"
                                class="form-control{{ $errors->has('area_id') ? ' is-invalid' : '' }}" name="area_id"
                                value="{{is_null(old('area_id')) ? $record->area_id : old('area_id')}}" required autofocus>
                            <option value="">SELECIONE</option>
                            @foreach ($areas as $key => $area)
                                @if(((!is_null($record->id)) && (!is_null($record->area_id) && $record->area_id === $area->id) || (!is_null(old('area_id'))) && old('area_id') == $area->id))
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

                @if (isset($record) and is_null($record->id))
                    <div class="form-group row">
                        <label for="original" class="col-sm-4 col-form-label text-md-right">{{ __('Solicitação') }}</label>
                        <div class="col-md-6">
                                <textarea id="original"
                                          class="form-control{{ $errors->has('original') ? ' is-invalid' : '' }}"
                                          name="original"
                                          value="{{is_null(old('original')) ? $record->original : old('original')}}"
                                          required rows="15">{{$record->original}}</textarea>
                            @if ($errors->has('original'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('original') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label for="send_answer_by_email" class="col-sm-4 col-form-label text-md-right">{{ __('Resposta por
                        e-mail')
                        }}</label>
                    <div class="col-md-6">
                        <input id="send_answer_by_email" type="hidden" name="send_answer_by_email" value="0">
                        <input id="send_answer_by_email" type="checkbox" name="send_answer_by_email" {{old('send_answer_by_email')
                        || $record->send_answer_by_email ? 'checked="checked"' : ''}} >
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

    @if (isset($progresses))
        @include('callcenter.progress.table')
    @endif
@endsection
