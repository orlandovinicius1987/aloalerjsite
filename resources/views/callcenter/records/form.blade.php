@extends('layouts.app')

@section('vue-app-name', 'vue-record')

@section('heading')
@parent
<div class="mt-4">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-title">
                {{--<i class="fas fa-plus-circle"></i> Adicionar / <i class="far fa-address-card"></i> Dados Pessoais <br>
                    --}}
                <ul class="aloalerj-breadcrumbs">
                    <li>
                        @if(isset($person))
                            <a href="{{ route('people.show', ['person_id' => $person->id]) }}">
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
            <div class="col-12 mb-4">
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
        <div class="col-lg-10 offset-lg-1 form-bigger">

            <form method="POST" action="{{ route('records.store') }}" aria-label="Protocolos" id="formRecords" class="form-with-labels">
                @csrf
                <input name="person_id" type="hidden" value="{{ $person->id }}">

                @if (isset($record))
                <input name="record_id" type="hidden" value="{{ $record->id }}">
                @endif

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="cpf_cnpj" class="col-form-label">CNPJ/CPF</label>
                        <input id="cpf_cnpj" class="form-control{{ $errors->getBag('validation')->has('cpf_cnpj')? ' is-invalid' : '' }} non-anonymous" name="cpf_cnpj"
                               v-mask='["###.###.###-##", "##.###.###/####-##"]'
                                value="{{$person->cpf_cnpj}}" readonly
                        >
                        @if ($errors->getBag('validation')->has('cpf_cnpj'))
                            <span class="invalid-feedback" role="alert"><strong>{{$errors->getBag('validation')->first('cpf_cnpj') }}</strong></span>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <label for="name" class="col-form-label">Nome Completo</label>
                        <input id="name" class="form-control{{ $errors->getBag('validation')->has('name') ? ' is-invalid' : '' }} non-anonymous" name="name"
                               value="{{$person->name}}" readonly >


                        @if ($errors->getBag('validation')->has('name'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                @include('callcenter.records.partials.form-basic',['person'=>$person,'record'=>$record])

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
                        <button href="#" id="openButton" class="btn btn-danger" v-on:click.prevent="confirm('{{route('records.reopen', $record->id) }}', 'formRecords')" @can('committee-canEdit', $record->committee ?? '')
                            :disabled="isEditing || isCreating || !{{$record->resolved_at ? 'true':'false'}}"
                            @else
                            disabled
                            @endcan
                            >
                            <i class="fas fa-redo"></i> Reabrir
                        </button>

                        <button href="#" id="finishButton" class="btn btn-danger" v-on:click.prevent="confirm('{{route('records.mark-as-resolved', $record->id) }}', 'formRecords')" @can('committee-canEdit', $record->committee ?? '')
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
                        @if($record && $record->id && $record->access_code == null)
                        <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                            <i class="far fa-copy"></i> Copiar link público
                        </button>
                        @endif
                        @if($record && $record->id && $record->access_code && !$person->is_anonymous)
                    <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="showAccessCode('{{$record->access_code}}', '{{route('records.recover-access-code' ,$record->id)}}', {{$has_email}})">
                            <i class="fas fa-redo"></i> Recuperar código de acesso
                        </button>
                        @endif
                    </div>
                </div>

                <input name="files_array" type="hidden" v-model="filesJsonString">

            </form>
        </div>
    </div>
</div>

@endsection
@section('content')
@if (isset($progresses))
    @include('callcenter.progress.index')
@else
    @include('callcenter.progress_files.index')
@endif
@endsection
