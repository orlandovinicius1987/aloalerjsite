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
                                           class="form-control{{ $errors->has('protocol') ? ' is-invalid' : '' }}" name="protocol"
                                           value="{{old('protocol')}}"
                                        >
                                    @if ($errors->has('protocol'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('protocol') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="person_name" class="col-form-label">Cidadão</label>
                                    <input id="person_name"
                                           class="form-control{{ $errors->has('person_name') ? ' is-invalid' : '' }}" name="person_name"
                                           value="{{old('person_name')}}"
                                        >
                                    @if ($errors->has('person_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('person_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="committee_id" class="col-form-label">Comissão</label>
                                    <select id="committee_id"
                                            class="form-control select2" name="committee_id"
                                            autofocus>
                                        <option value="">SELECIONE</option>
                                        @foreach ($committees as $key => $committee)
                                            @if((!is_null(old('committee_id'))) && old('committee_id') == $committee->id)
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
                                    <select id="area_id"
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
                                    <label for="record_type_id" class="col-form-label">Tipo</label>
                                    <select id="record_type_id"
                                            class="form-control select2" name="record_type_id"
                                            autofocus>
                                        <option value="">SELECIONE</option>
                                        @foreach ($recordTypes as $key => $recordType)
                                            @if((!is_null(old('record_type_id'))) && old('record_type_id') == $recordType->id)
                                                <option value="{{ $recordType->id }}" selected="selected">{{ $recordType->name }}</option>
                                            @else
                                                <option value="{{ $recordType->id }}">{{ $recordType->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="created_at_start" class="col-form-label">Data Abertura Protocolo<br> De:</label>
                                    <input id="created_at_start"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="created_at_start"
                                           value="{{old("created_at_start")}}"
                                           type="date"
                                    >
                                    <label for="created_at_end" class="col-form-label"> Até: </label>
                                    <input id="created_at_end"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="created_at_end"
                                           value="{{old("created_at_end")}}"
                                           type="date"
                                    >
                                </div>

                                <div class="col-md-3">
                                    <label for="resolved_at_start" class="col-form-label">Data Fechamento Protocolo<br> De:</label>
                                    <input id="resolved_at_start"
                                           class="form-control" name="resolved_at_start"
                                           value="{{old("resolved_at_start")}}"
                                           type="date"
                                    >
                                    <label for="resolved_at_end" class="col-form-label"> Até: </label>
                                    <input id="resolved_at_end"
                                           class="form-control" name="resolved_at_end"
                                           value="{{old("resolved_at_end")}}"
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
