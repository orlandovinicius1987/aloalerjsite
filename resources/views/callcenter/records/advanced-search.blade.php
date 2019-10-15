@extends('layouts.app')

@section('heading')
        <div class="mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group text-center">
                        <form method="post" action="{{ route('records.advanced-search') }}" aria-label="Protocolos" id="formRecords">
                            @csrf
                            <h2 class="section-title">
                                <i class="fas fa-search"></i> Busca Avançada de  Protocolos
                            </h2>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="protocol" class="col-form-label">Protocolo</label>
                                    <input id="protocol"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="protocol"
                                           value="{{old('protocol')}}"
                                        >
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="col-form-label">Cidadão</label>
                                    <input id="person_name"
                                           class="form-control{{ $errors->has('short_name') ? ' is-invalid' : '' }}" name="person_name"
                                           value="{{old('person_name')}}"
                                        >
                                    @if ($errors->has('short_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('short_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="col-form-label">Comissão</label>
                                    <select id="committee_id"
                                            class="form-control select2" name="committee_id"
                                            autofocus>
                                        <option value="">SELECIONE</option>
                                        @foreach ($committees as $key => $committee)
                                            @if((!is_null(old('$committee'))) && old('$committee') == $committee->id)
                                                <option value="{{ $committee->id }}" selected="selected">{{ $committee->name }}</option>
                                            @else
                                                <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="area_id" class="col-form-label">Área</label>
                                    <select id="committee_id"
                                            class="form-control select2" name="area_id"
                                            autofocus>
                                        <option value="">SELECIONE</option>
                                        @foreach ($areas as $key => $area)
                                            @if((!is_null(old('area_id'))) && old('area_id') == $area->id)
                                                <option value="{{ $area->id }}" selected="selected">{{ $area->name }}</option>
                                            @else
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="area_id" class="col-form-label">Tipo</label>
                                    <select id="committee_id"
                                            class="form-control select2" name="record_type_id"
                                            autofocus>
                                        <option value="">SELECIONE</option>
                                        @foreach ($recordTypes as $key => $recordType)
                                            @if((!is_null(old('$committee'))) && old('$committee') == $recordType->id)
                                                <option value="{{ $recordType->id }}" selected="selected">{{ $recordType->name }}</option>
                                            @else
                                                <option value="{{ $recordType->id }}">{{ $recordType->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="protocol" class="col-form-label">Data Abertura Protocolo</label>
                                    <input id="created_at"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="created_at"
                                           value="{{old("created_at")}}"
                                           type="date"
                                    >
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="col-form-label">Data Fechamento Protocolo</label>
                                    <input id="resolved_at"
                                           class="form-control" name="resolved_at"
                                           value="{{old("resolved_at")}}"
                                           type="date"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">


                                <div class="col-md-10" >
                                    <button type="submit" class="btn btn-danger"  id="save_button">
                                        <i class="far fa-save"></i> buscar
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
    @if (isset($records) and !is_null($records))
        @include('callcenter.records.partials.table', ['record' => $records])
    @endif
@endsection
