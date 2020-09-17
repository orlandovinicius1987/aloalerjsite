@extends('layouts.app')
@section('heading')
@parent
<div class="mt-4" id="vue-record">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                {{--<i class="fas fa-plus-circle"></i> Adicionar / <i class="far fa-address-card"></i> Dados Pessoais <br>
                    --}}
                <ul class="aloalerj-breadcrumbs">
                    <li>
                        @if(isset($person))
                            <a href="{{ route('people.show', ['id' => $person->id]) }}">
                                {{ $person->name }}
                            </a>
                        @endif
                    </li>
                    <li>
                        <i class="fas fa-list-ol"></i>
                        @if (!$record->id)
                        Novo
                        @endif
                        Protocolo {{ $record->protocol }}
                    </li>
                </ul>
            </div>

            @if ($record->id)
            <div class="offset-md-4 col-4 mb-4">
                <h4>
                    @if ($record->resolved_at)
                    <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">PROTOCOLO FINALIZADO</span>
                        @else
                        <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">PROTOCOLO EM ANDAMENTO</span>
                            @endif
                </h4>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2 form-bigger">

            <form method="POST" action="{{ route('records.store') }}" aria-label="Protocolos" id="formRecords" class="form-with-labels">
                @csrf
                @if (isset($person))
                <input name="person_id" type="hidden" value="{{ $person->id }}">
                @endif
                @if (isset($record))
                <input name="record_id" type="hidden" value="{{ $record->id }}">
                @endif

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="cpf_cnpj" class="col-form-label">CNPJ/CPF</label>
                        <input id="cpf_cnpj" class="form-control{{ $errors->getBag('validation')->has('cpf_cnpj')? ' is-invalid' : '' }}" name="cpf_cnpj"
                               v-mask='["###.###.###-##", "##.###.###/####-##"]'
                               @if(isset($person))
                                value="{{$person->cpf_cnpj}}" readonly
                               @else
                                   value="{{old('cpf_cnpj')}}"
                                @endif
                        >
                        @if ($errors->getBag('validation')->has('cpf_cnpj'))
                            <span class="invalid-feedback" role="alert"><strong>{{$errors->getBag('validation')->first('cpf_cnpj') }}</strong></span>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <label for="name" class="col-form-label">Nome Completo</label>
                        <input id="name" class="form-control{{ $errors->getBag('validation')->has('name') ? ' is-invalid' : '' }}" name="name"
                               @if(isset($person))
                               value="{{$person->name}}" readonly
                            @else
                               value="{{old('name')}}"
                            @endif
                        >


                        @if ($errors->getBag('validation')->has('name'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>
                @if(!isset($person))

                <div class="form-group row">

                    <div class="col-md-3">
                        <label for="mobile" class="col-form-label">Celular</label>
                        <input class="form-control{{ $errors->getBag('validation')->has('mobile') ? ' is-invalid' : '' }}"
                               id="mobile"
                               name="mobile"
                               @if(isset($contact))
                               value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile') }}"
                               v-init:mobile="'{{is_null(old('mobile')) ? $contact->mobile : old('mobile')}}'"
                               @else
                               value="{{old('mobile') }}"
                               v-init:mobile="'{{old('mobile')}}'"
                               @endif
                               autofocus
                               v-mask='["(##)####-####", "(##)#####-####"]'
                            {{--                               v-model='form.mobile'--}}
                        >

                        @if ($errors->getBag('validation')->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="whatsapp" class="col-form-label">Whatsapp</label>
                        <input class="form-control{{ $errors->getBag('validation')->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp"
                               id="whatsapp"
                               @if(isset($contact))
                               value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp') }}"
                               v-init:whatsapp="'{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp')}}'"
                               @else
                               value="{{old('whatsapp') }}"
                               v-init:whatsapp="'{{old('whatsapp')}}'"
                               @endif
                               autofocus
                               v-mask='["(##)#####-####"]'
                            {{--                               v-model='form.whatsapp'--}}

                        >

                        @if ($errors->getBag('validation')->has('whatsapp'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('whatsapp') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="col-form-label">E-mail</label>
                        <input type=email class="form-control{{ $errors->getBag('validation')->has('email') ? ' is-invalid' : '' }}" name="email"
                               id="email"
                               @if(isset($contact))
                               value="{{is_null(old('email')) ? $contact->email : old('email') }}"
                               @else
                               value="{{old('email') }}"
                               @endif
                               autofocus>

                        @if ($errors->getBag('validation')->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <label for="phone" class="col-form-label">Telefone Fixo</label>
                        <input class="form-control{{ $errors->getBag('validation')->has('phone') ? ' is-invalid' : '' }}" name="phone"
                               id="phone"
                               @if(isset($contact))
                               value="{{is_null(old('phone')) ? $contact->phone : old('phone') }}"
                               v-init:phone="'{{is_null(old('phone')) ? $contact->phone : old('phone')}}'"
                               @else
                               value="{{old('phone') }}"
                               v-init:phone="'{{old('phone')}}'"
                               @endif
                               autofocus
                               v-mask="['(##) ####-####', '(##) #####-####']"
                            {{--                               v-model='form.phone'--}}

                        >

                        @if ($errors->getBag('validation')->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->getBag('validation')->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                @endif

                <div class="form-group row">
                    <input type="hidden" name="is_anonymous" :value="is_anonymous" />
                    @if(!isset($person))
                        <div class="col-md-3">
                             <label for="is_anonymous" class="col-form-label">Protocolo Anônimo?</label><br />
    {{--                            <input id="is_anonymous" type="checkbox" name="is_anonymous" v-on:change="toggleAnonymous"--}}
    {{--                               :value="is_anonymous"  data-toggle="toggle"--}}
    {{--                                   data-style="ios"/>--}}

                            <button type="button" type="button" class="btn btn-sm btn-toggle inactive" data-toggle="button" aria-pressed="true" autocomplete="não"
                                    v-on:click="toggleAnonymous" :value="is_anonymous">
                                <div class="handle"></div>
                            </button>
                        </div>
                    @endif
                </div>


                <div class="form-group row">
                    @if (isset($record) and is_null($record->id))
                    <div class="col-md-4">
                        <label for="origin_id" class="col-form-label">Origem</label>
                        <select id="origin_id" class="form-control{{ $errors->getBag('validation')->has('origin_id') ? ' is-invalid' : '' }} select2" name="origin_id" value="{{is_null(old('origin_id')) ? $record->origin_id : old('origin_id') }}" required autofocus>
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
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('origin_id') }}</strong></span>
                        @endif
                    </div>
                    @endIf

                    <div class="col-md-4">
                        <label for="committee_id" class="col-form-label">Departamento</label>
                        <select id="committee_id" class="form-control{{ $errors->getBag('validation')->has('committee_id') ? ' is-invalid' : '' }} select2" name="committee_id" value="{{is_null(old('committee_id')) ? $record->committee_id : old('committee_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
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
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('committee_id') }}</strong></span>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <label for="record_type_id" class="col-form-label">Tipo</label>
                        <select id="record_type_id" class="form-control{{ $errors->getBag('validation')->has('record_type_id') ? ' is-invalid' : '' }} select2" name="record_type_id" value="{{is_null(old('record_type_id')) ? $record->record_type_id : old('record_type_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
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
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('record_type_id') }}</strong>M/span>
                            @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="area_id" class="col-form-label">Assunto</label>
                        <select id="area_id" type="area_id" class="form-control{{ $errors->getBag('validation')->has('area_id') ? ' is-invalid' : '' }} select2" name="area_id" value="{{is_null(old('area_id')) ? $record->area_id : old('area_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
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
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('area_id') }}</strong></span>
                        @endif
                    </div>
                    <input id="send_answer_by_email" type="hidden" name="send_answer_by_email" value="0">

                    @if(!$person || !$person->is_anonymous)
                        <div class="col-md-3">
                            <label for="send_answer_by_email_checkbox" class="col-form-label">Resposta por e-mail</label>
                            {{--<p class="form-twolines">--}}
                            {{--<button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="não" @include('partials.disabled',['model'=>$record])>--}}
                            {{--<div class="handle"></div>--}}
                            {{--</button>--}}
                            {{--</p>--}}

                            <p class="checkbox">

                                <input id="send_answer_by_email_checkbox" type="checkbox" name="send_answer_by_email" {{old('send_answer_by_email')
                                    || $record->send_answer_by_email ? 'checked="checked"' : ''}}>
                            </p>
                        </div>
                    @endIf
                </div>



                <div class="form-group row">
                    @if (isset($record) and is_null($record->id))
                    <div class="col-md-12">
                        <label for="original" class="col-form-label">Solicitação</label>
                        <textarea id="original" class="form-control{{ $errors->getBag('validation')->has('original') ? ' is-invalid' : '' }}" name="original" required rows="15">{{is_null(old('original')) ? $record->original : old('original') }}</textarea>
                        @if ($errors->getBag('validation')->has('original'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('original') }}</strong></span>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="form-group row">
                    @if (!$workflow && $record->created_at_formatted)
                    <div class="col-md-6">
                        <label for="identification" class="col-form-label">Criado em</label>
                        <input id="identification" class="form-control" value="{{ $record->created_at_formatted ?? '' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="identification" class="col-form-label">Alterado em</label>
                        <input id="identification" class="form-control" value="{{ $record->updated_at_formatted ?? '' }}" disabled>
                    </div>
                    @endif
                </div>

                <div class="form-group row mb-4 mt-5">
                    <div class="col-md-12 text-center">
                        @if($workflow)
                        <button id="saveButton" type="submit" class="btn btn-danger">
                            Próximo passo <i class="fas fa-forward"></i>
                        </button>
                        @else
                        <button id="saveButton" class="btn btn-danger" :disabled="!(isEditing || isCreating)">
                            <i class="far fa-save"></i> Gravar
                        </button>
                        @if ($record->id)
                        @include('partials.edit-button',['model'=>$record, 'form' =>'formRecords'])
                        <button href="#" id="openButton" class="btn btn-danger" v-on:click.prevent="confirm('{{route('records.reopen', $record->id) }}', 'formRecords')" @can('committee-canEdit', $record->committee->id ?? '')
                            :disabled="isEditing || isCreating || !{{$record->resolved_at ? 'true':'false'}}"
                            @else
                            disabled
                            @endcan
                            >
                            <i class="fas fa-redo"></i> Reabrir
                        </button>

                        <button href="#" id="finishButton" onclick="return false;" class="btn btn-danger" v-on:click.prevent="confirm('{{route('records.mark-as-resolved', $record->id) }}', 'formRecords')" @can('committee-canEdit', $record->committee->id ?? '')
                            :disabled="isEditing || isCreating || {{$record->resolved_at ? 'true':'false'}}"
                            @else
                            disabled
                            @endcan
                            >
                            <i class="fas fa-flag-checkered"></i> Finalizar
                        </button>
                        @endif
                        <button id="cancelButton" class="btn btn-danger" v-on:click.prevent="cancel()" :disabled="!(isEditing || isCreating)">
                            <i class="fas fa-ban"></i> Cancelar
                        </button>
                        @endif
                        @if($record && $record->id)
                        <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                            <i class="far fa-copy"></i> Copiar link público
                        </button>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@section('content')
@if (isset($progresses))
@include('callcenter.progress.index')
@endif
@endsection
