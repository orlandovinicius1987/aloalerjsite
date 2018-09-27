@extends('layouts.app')

@section('content')
    <div class="card mt-4"  id="vue-record">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <a href="{{ route('people.show', ['id' => $person->id]) }}">
                                {{ $person->name }}
                            </a>
                        </li>

                        <li>
                            @if (!$record->id)
                                Novo
                            @endif

                            Protocolo {{ $record->protocol }}
                        </li>
                    </ul>
                </div>

                @if ($record->id)
                    <div class="col-4">
                        <h5 class="text-right">
                                @if ($record->resolved_at)
                                    <span class="badge badge-danger">PROTOCOLO FINALIZADO</span>
                                @else
                                    <span class="badge badge-success">PROTOCOLO EM ANDAMENTO</span>
                                @endif
                        </h5>
                    </div>
                @endif
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('records.store') }}" aria-label="Protocolos" id="formRecords">
                @csrf

                @if (isset($person))
                    <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif

                @if (isset($record))
                    <input name="record_id" type="hidden" value="{{ $record->id }}">
                @endif

                <div class="form-group row">
                    <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">CNPJ/CPF</label>
                    <div class="col-md-6">
                        <input id="cpf_cnpj"
                               class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}" name="cpf_cnpj"
                               value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj') }}"
                               readonly="readonly">
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
                        <label for="origin_id" class="col-sm-4 col-form-label text-md-right">Origem</label>

                        <div class="col-md-6">
                            <select id="origin_id"
                                    class="form-control{{ $errors->getBag('validation')->has('origin_id') ? ' is-invalid' : '' }} select2" name="origin_id"
                                    value="{{is_null(old('origin_id')) ? $record->origin_id : old('origin_id') }}" required
                                    autofocus
                            >
                                <option value="">SELECIONE</option>
                                @foreach ($origins as $key => $origin)
                                    @if(((!is_null($record->id)) && (!is_null($record->origin_id) && $record->origin_id === $origin->id) || (!is_null(old('origin_id'))) && old('origin_id') == $origin->id))
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
                @endIf

                <div class="form-group row">
                    <label for="committee_id" class="col-sm-4 col-form-label text-md-right">Comissão</label>

                    <div class="col-md-6">
                        <select id="committee_id"
                                class="form-control{{ $errors->getBag('validation')->has('committee_id') ? ' is-invalid' : '' }} select2"
                                name="committee_id"
                                value="{{is_null(old('committee_id')) ? $record->committee_id : old('committee_id') }}"
                                required
                                autofocus
                                @include('partials.disabled',['model'=>$record])>
                            <option value="">SELECIONE</option>
                            @foreach ($committees as $key => $committe)
                                @if(((!is_null($record->id)) && (!is_null($record->committee_id) && $record->committee_id === $committe->id) || (!is_null(old('committee_id'))) && old('committee_id') == $committe->id))
                                    <option value="{{ $committe->id }}" selected="selected">{{ $committe->name }}</option>
                                @else
                                    <option value="{{ $committe->id }}">{{ $committe->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('committee_id'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('committee_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="record_type_id" class="col-sm-4 col-form-label text-md-right">Tipo</label>

                    <div class="col-md-6">
                        <select id="record_type_id"
                                class="form-control{{ $errors->getBag('validation')->has('record_type_id') ? ' is-invalid' : '' }} select2"
                                name="record_type_id"
                                value="{{is_null(old('record_type_id')) ? $record->record_type_id : old('record_type_id') }}"
                                required
                                autofocus
                                @include('partials.disabled',['model'=>$record])>
                            <option value="">SELECIONE</option>
                            @foreach ($recordTypes as $key => $recordType)
                                @if(((!is_null($record->id)) && (!is_null($record->record_type_id) && $record->record_type_id === $recordType->id) || (!is_null(old('record_type_id'))) && old('record_type_id') == $recordType->id))
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

            @if (isset($record) and is_null($record->id))
                <div class="form-group row">
                    <label for="progress_type_id" class="col-sm-4 col-form-label text-md-right">Assunto</label>

                    <div class="col-md-6">
                        <select id="progress_type_id" type="progress_type_id"
                                class="form-control{{ $errors->getBag('validation')->has('progress_type_id') ? ' is-invalid' : '' }} select2" name="progress_type_id"
                                value="" required autofocus>
                            <option value="">SELECIONE</option>
                            @foreach ($progressTypes as $key => $progressType)
                                    <option value="{{ $progressType->id }}">{{ $progressType->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->getBag('validation')->has('progress_type_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('progress_type_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endIf

            <div class="form-group row">
                <label for="area_id" class="col-sm-4 col-form-label text-md-right">Área</label>

                    <div class="col-md-6">
                        <select id="area_id" type="area_id"
                                class="form-control{{ $errors->getBag('validation')->has('area_id') ? ' is-invalid' : '' }} select2" name="area_id"
                                value="{{is_null(old('area_id')) ? $record->area_id : old('area_id') }}" required autofocus
                                @include('partials.disabled',['model'=>$record])>
                            <option value="">SELECIONE</option>
                            @foreach ($areas as $key => $area)
                                @if(((!is_null($record->id)) && (!is_null($record->area_id) && $record->area_id === $area->id) || (!is_null(old('area_id'))) && old('area_id') == $area->id))
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

                @if (isset($record) and is_null($record->id))
                    <div class="form-group row">
                        <label for="original" class="col-sm-4 col-form-label text-md-right">Solicitação</label>
                        <div class="col-md-6">
                                <textarea id="original"
                                          class="form-control{{ $errors->getBag('validation')->has('original') ? ' is-invalid' : '' }}"
                                          name="original"
                                          value="{{is_null(old('original')) ? $record->original : old('original') }}"
                                          required rows="15">{{$record->original}}</textarea>
                            @if ($errors->getBag('validation')->has('original'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('original') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label for="send_answer_by_email" class="col-sm-4 col-form-label text-md-right">Resposta por e-mail</label>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off" @include('partials.disabled',['model'=>$record])>
                            <div class="handle"></div>
                        </button>

                        {{--<input id="send_answer_by_email" type="hidden" name="send_answer_by_email" value="0">
                        <input id="send_answer_by_email" type="checkbox" name="send_answer_by_email" {{old('send_answer_by_email')
                        || $record->send_answer_by_email ? 'checked="checked"' : ''}} >--}}
                    </div>
                </div>

                @if (!$workflow && $record->created_at_formatted)
                    <div class="form-group row">
                        <label for="identification" class="col-sm-4 col-form-label text-md-right">
                            Criado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                class="form-control"
                                value="{{ $record->created_at_formatted ?? '' }}"
                                disabled
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="identification" class="col-sm-4 col-form-label text-md-right">
                            Alterado em
                        </label>

                        <div class="col-md-4">
                            <input id="identification"
                                class="form-control"
                                value="{{ $record->updated_at_formatted ?? '' }}"
                                disabled
                            >
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        @if($workflow)
                            <button id="saveButton" type="submit" class="btn btn-danger btn-depth">
                                    Próximo passo >>
                            </button>
                        @elseif(is_null($record->committee))
                            @include('partials.edit-button',['model'=>$record, 'form' =>'formRecords'])

                            <button id="saveButton" class="btn btn-danger" @include('partials.disabled',['model'=>$record])>
                                Gravar
                            </button>

                            @if ($record->resolved_at)
                                <a href="#" id="openButton" class="btn btn-danger" v-on:click="confirm('{{route('records.reopen', $record->id) }}', 'formRecords')" >
                                    Reabrir
                                </a>
                            @elseif(!is_null($record->id))
                                <a href="#" id="finishButton" onclick="return false;" class="btn btn-danger" v-on:click="confirm('{{route('records.mark-as-resolved', $record->id) }}', 'formRecords')" :disabled="(isEditing || isCreating) || {{$record->resolved_at ? 'true':'false'}} && @can('committee-'.($record->committee->slug ?? ''), \Auth::user()) 'true' @else 'false' @endcan" >
                                    Finalizar
                                </a>
                            @endif
                        @else
                            @if(isset($record) && ! is_null($record->id))
                                <button  type="button" v-on:click="editButton" class="btn btn-danger" id="vue-editButton" @can('committee-canEdit', $record->committee->id ?? '', \Auth::user()) :disabled="isEditing || isCreating" @else disabled @endcan>
                                    Alterar
                                </button>
                            @endif

                            <button id="saveButton" class="btn btn-danger" v-on:click="confirmForPost('{{route('records.store') }}', 'formRecords')" @can('committee-canEdit', $record->committee->id ?? '', \Auth::user()) @include('partials.disabled',['model'=>$record]) @else disabled @endcan>
                                Gravar
                            </button>

                            <button id="cancelButton" class="btn btn-danger" v-on:click.prevent="cancel()"  :disabled="!(isEditing || isCreating)">
                                Cancelar
                            </button>

                            <a href="#" id="openButton" onclick="return false;" class="btn btn-danger" v-on:click="confirm('{{route('records.reopen', $record->id) }}')"  @can('committee-canEdit', $record->committee->id ?? '', \Auth::user()) :disabled="{{$record->resolved_at ? 'true':'false' }} && (isEditing || isCreating)" @else disabled @endcan>
                                Reabrir
                            </a>

                            <a href="#" id="finishButton" onclick="return false;" class="btn btn-danger" v-on:click="confirm('{{ route('records.mark-as-resolved', $record->id) }}')" @can('committee-canEdit', $record->committee->id ?? '', \Auth::user()) :disabled="{{$record->resolved_at ? 'false': 'true'}} && (isEditing || isCreating)" @else disabled @endcan>
                                Finalizar
                            </a>
                        @endif

                        @if($record && $record->id)
                            <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                                Copiar link público
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($progresses))
        @include('callcenter.progress.index')
    @endif
@endsection
