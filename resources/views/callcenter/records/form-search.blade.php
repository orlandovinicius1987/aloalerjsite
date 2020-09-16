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
                        <i class="fas fa-list-ol"></i>
                        Novo Protocolo
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2 form-bigger">

            <form method="POST" action="{{ route('records.store-from-search') }}" aria-label="Protocolos" id="formRecords" class="form-with-labels">
                @csrf

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="cpf_cnpj" class="col-form-label">CNPJ/CPF</label>
                        <input id="cpf_cnpj" class="form-control{{ $errors->getBag('validation')->has('cpf_cnpj')? ' is-invalid' : '' }} non-anonymous" name="cpf_cnpj"
                               v-mask='["###.###.###-##", "##.###.###/####-##"]'
                               @if(isset($person))
                                value="{{$person->cpf_cnpj}}" readonly
                               @elseif(isset($cpf_cnpj))
                                value="{{$cpf_cnpj}}"
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
                        <input id="name" class="form-control{{ $errors->getBag('validation')->has('name') ? ' is-invalid' : '' }} non-anonymous" name="name"
                           @if(isset($person))
                                value="{{$person->name}}" readonly
                           @elseif(isset($name))
                               value="{{$name}}"
                           @else
                               value="{{old('name')}}"
                           @endif
                        >


                        @if ($errors->getBag('validation')->has('name'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-3">
                        <label for="mobile" class="col-form-label">Celular</label>
                        <input class="form-control{{ $errors->getBag('validation')->has('mobile') ? ' is-invalid' : '' }} non-anonymous"
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
                        <input class="form-control{{ $errors->getBag('validation')->has('whatsapp') ? ' is-invalid' : '' }} non-anonymous" name="whatsapp"
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
                        <input type=email class="form-control{{ $errors->getBag('validation')->has('email') ? ' is-invalid' : '' }} non-anonymous" name="email"
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
                        <input class="form-control{{ $errors->getBag('validation')->has('phone') ? ' is-invalid' : '' }} non-anonymous" name="phone"
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

                <div class="form-group row">

                    <input type="hidden" name="is_anonymous" :value="is_anonymous" />
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
                    <div class="col-md-3">
                        <label for="create_address" class="col-form-label">Cadastrar Endereço?</label><br />

                        <button type="button" type="button" id="btn_create_address" :class="toggle_create_address_status"
                                data-toggle="button" aria-pressed="true" autocomplete="não"
                                v-on:click="toggleCreateAddress" :value="create_address">
                            <div class="handle"></div>
                            <input type="hidden" name="create_address" :value="create_address" />
                        </button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="zipcode" class="col-form-label">CEP</label>
                        <input id="zipcode"
                               name="zipcode"
                               v-model="form.zipcode"
                               v-init:zipcode="'{{is_null(old('zipcode')) ? '' : old('zipcode') }}'"
                               value="{{is_null(old('zipcode')) ? '' : old('zipcode') }}"
                               class="form-control{{ $errors->getBag('validation')->has('zipcode') ? ' is-invalid' : '' }} address-disabled"
                               @keyup="typeKeyUp"
                               :disabled="!create_address"
                               v-mask='["##.###-###"]'
                        >
                        @if ($errors->getBag('validation')->has('zipcode'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('zipcode') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="street" class="col-form-label">Endereço</label>
                        <input id="street"
                               name="street"
                               v-model="form.street"
                               v-init:street="'{{is_null(old('street')) ? '' : old('street') }}'"
                               value="{{is_null(old('street')) ? '' : old('street') }}"
                               class="form-control{{ $errors->getBag('validation')->has('street') ? ' is-invalid' : '' }} address-disabled"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('street'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('street') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label for="number" class="col-form-label">Número</label>
                        <input id="number"
                               name="number"
                               {{--v-on:keypress="isNumber(event)"--}}
                               value="{{is_null(old('number')) ? '' : old('number') }}"
                               class="form-control{{ $errors->getBag('validation')->has('number') ? ' is-invalid' : '' }} address-disabled"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('number'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('number') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label for="complement" class="col-form-label text-md-right">Complemento</label>
                        <input id="complement"
                               name="complement"
                               value="{{is_null(old('complement')) ? '' : old('complement') }}"
                               class="form-control{{ $errors->getBag('validation')->has('complement') ? ' is-invalid' : '' }} address-disabled"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('complement'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('complement') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="neighbourhood" class="col-form-label">Bairro</label>
                        <input id="neighbourhood"
                               name="neighbourhood"
                               v-model="form.neighbourhood"
                               {{--                               v-init:neighbourhood="'{{is_null(old('neighbourhood')) ? '': old('neighbourhood') }}'"--}}
                               value="{{is_null(old('neighbourhood')) ? '': old('neighbourhood') }}"
                               class="form-control{{ $errors->getBag('validation')->has('neighbourhood') ? ' is-invalid' : '' }} address-disabled"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('neighbourhood'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('neighbourhood') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="city" class="col-form-label">Cidade</label>
                        <input id="city"
                               name="city"
                               v-model="form.city"
                               {{--                               v-init:city="'{{is_null(old('city')) ? '' : old('city') }}'"--}}
                               value="{{is_null(old('city')) ? '' : old('city') }}"
                               class="form-control{{ $errors->getBag('validation')->has('city') ? ' is-invalid' : '' }} address-disabled"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('city'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('city') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label for="state" class="col-form-label text-md-right">Estado</label>
                        <input id="state"
                               name="state"
                               v-model="form.state"
                               {{--                               v-init:state="'{{is_null(old('state')) ? '' : old('state') }}'"--}}
                               value="{{is_null(old('state')) ? '' : old('state') }}"
                               class="address-disabled form-control{{ $errors->getBag('validation')->has('state') ? ' is-invalid' : '' }}"
                               :disabled="!create_address"
                               autofocus
                            {{--                            @include('partials.disabled',['model'=>address-disabled$address])--}}
                        >
                        @if ($errors->getBag('validation')->has('state'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('state') }}</strong></span>
                        @endif
                    </div>
                </div>


                @include('callcenter.records.partials.form-basic',['person'=>null,'record'=>$record])


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
