@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="vue-progress">
        <div class="card-header">
            <ul class="aloalerj-breadcrumbs">
                <li>
                    <a href="{{ route('people.show', ['id' => $record->person->id]) }}">{{ $record->person->name }}</a>
                </li>

                <li>
                    <a href="{{ route('records.show', ['id' => $record->id]) }}">Protocolo {{ $record->protocol }}</a>
                </li>

                <li>Andamentos</li>
            </ul>
        </div>

        <div class="card-body">
            <form id="formProgress" method="POST" action="{{ route('progresses.store') }}">
                @csrf

                @if (isset($progress))
                    <input name="id" type="hidden" value="{{ $progress->id }}">
                @endif

                <input name="record_id" type="hidden" value="{{ $record->id }}">

                <div class="form-group row">
                    <label for="protocol" class="col-sm-4 col-form-label text-md-right">Protocolo</label>
                    <div class="col-md-6">
                        <input id="cpf_cnpj"
                               class="form-control{{ $errors->getBag('validation')->has('protocol') ? ' is-invalid' : '' }}" name="protocol"
                               value="{{is_null(old('protocol')) ? $record->protocol : old('protocol') }}"
                               readonly="readonly">
                        @if ($errors->getBag('validation')->has('protocol'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('protocol') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="origin_id" class="col-sm-4 col-form-label text-md-right">Origem</label>

                    <div class="col-md-6">
                        <select id="origin_id"
                                class="form-control{{ $errors->getBag('validation')->has('origin_id') ? ' is-invalid' : '' }} select2" name="origin_id" @include('partials.disabled')
                                value="{{is_null(old('origin_id')) ? $progress->origin_id : old('origin_id') }}" autofocus required>
                            <option value="">SELECIONE</option>
                            @foreach ($origins as $key => $origin)
                                @if(((!is_null($progress->id)) && (!is_null($progress->origin_id) && $progress->origin_id === $origin->id) ||
                                (!is_null(old('origin_id'))) && old('origin_id') == $origin->id))
                                    <option value="{{ $origin->id }}" selected="selected">{{ $origin->name }}</option>
                                @else
                                    <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('origin_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('origin_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="record_type_id" class="col-sm-4 col-form-label text-md-right">Tipo</label>

                    <div class="col-md-6">
                        <select id="record_type_id" type="record_type_id"
                                class="form-control{{ $errors->getBag('validation')->has('record_type_id') ? ' is-invalid' : '' }} select2" name="record_type_id"
                                value="{{is_null(old('record_type_id')) ? $progress->record_type_id : old('record_type_id') }}" autofocus @include('partials.disabled')>
                            <option value="">SELECIONE</option>
                            @foreach ($recordTypes as $key => $recordType)
                                @if(((!is_null($progress->id)) && (!is_null($progress->record_type_id) && $progress->record_type_id === $recordType->id) ||
                                (!is_null(old('record_type_id'))) && old('record_type_id') == $recordType->id))
                                    <option value="{{ $recordType->id }}" selected="selected">{{ $recordType->name }}</option>
                                @else
                                    <option value="{{ $recordType->id }}">{{ $recordType->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('record_type_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('record_type_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="area_id" class="col-sm-4 col-form-label text-md-right">Área</label>

                    <div class="col-md-6">
                        <select id="area_id" type="area_id"
                                class="form-control{{ $errors->getBag('validation')->has('area_id') ? ' is-invalid' : '' }} select2" name="area_id"
                                value="{{is_null(old('area_id')) ? $progress->area_id : old('area_id') }}" autofocus @include('partials.disabled')>
                            <option value="">SELECIONE</option>
                            @foreach ($areas as $key => $area)
                                @if(((!is_null($progress->id)) && (!is_null($progress->area_id) && $progress->area_id === $area->id) ||
                                (!is_null(old('area_id'))) && old('area_id') == $area->id))
                                    <option value="{{ $area->id }}" selected="selected">{{ $area->name }}</option>
                                @else
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('area_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('area_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="progress_type_id" class="col-sm-4 col-form-label text-md-right">Tipo de Andamento</label>

                    <div class="col-md-6">
                        <select id="progress_type_id" type="progress_type_id"
                                class="form-control{{ $errors->getBag('validation')->has('progress_type_id') ? ' is-invalid' : '' }} select2" name="progress_type_id"
                                value="{{is_null(old('progress_type_id')) ? $progress->progress_type_id : old('progress_type_id') }}" autofocus @include('partials.disabled')>
                            <option value="">SELECIONE</option>
                            @foreach ($progressTypes as $key => $progressType)
                                @if(((!is_null($progress->id)) && (!is_null($progress->progress_type_id) && $progress->progress_type_id === $progressType->id) ||
                                (!is_null(old('progress_type_id'))) && old('progress_type_id') == $progressType->id))
                                    <option value="{{ $progressType->id }}" selected="selected">{{ $progressType->name }}</option>
                                @else
                                    <option value="{{ $progressType->id }}">{{ $progressType->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('progress_type_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->getBag('validation')->first('progress_type_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="original" class="col-sm-4 col-form-label text-md-right">Solicitação</label>
                    <div class="col-md-6">
                    <textarea id="original"
                      class="form-control{{ $errors->getBag('validation')->has('original') ? ' is-invalid' : '' }}"
                      name="original"
                      value="{{is_null(old('original')) ? $progress->original : old('original') }}"
                      required rows="15" @include('partials.disabled')>{{$progress->original}}</textarea>
                        @if ($errors->getBag('validation')->has('original'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('original') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        @include('partials.previous-button')

                        {{--@include('partials.edit-button',['model'=>$progress, 'form' =>'formProgress'])--}}

                        <button v-on:click="changeFormRoute('{{route('progresses.store') }}')" class="btn btn-danger btn-depth" @include('partials.disabled')>
                            Gravar
                        </button>

                        @if ($record->resolved_at)
                            <button onclick="return false;" v-on:click="confirm('{{route('progresses.openRecord') }}')" class="btn btn-danger btn-depth" @include('partials.disabled')>
                                Gravar e reabrir
                            </button>
                        @else
                            <button onclick="return false;" v-on:click="confirm('{{route('progresses.finishRecord') }}')" class="btn btn-danger btn-depth" @include('partials.disabled')>
                                Gravar e finalizar
                            </button>
                        @endif

                        @if ($progress && $progress->id)
                            <a href="{{ route('progresses.notify', $progress->id) }}" class="btn btn-primary btn-depth">
                                Notificar cidadão
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
