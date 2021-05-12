@extends('layouts.app')

@section('content')

    <div id="vue-committee-services">
        <div class="row mt-4" >
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-title">

                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <h2>
                                <i class="far fa-window-maximize"></i> Serviços
                            </h2>
                        </li>
                        <li>
                            Criar Novo Serviço
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-10 offset-lg-1 form-bigger">

                <form method="POST" action="{{ route('committee_services.store') }}" aria-label="Serviços" name="formCommitteeService" id="formCommitteeService" class="form-with-labels">
                    @csrf

                    @if (isset($committeeService))
                        <input name="id" type="hidden" value="{{ $committeeService->id }}">
                    @endif

                    <input name="committee_id" id="committee_id" type="hidden" value="{{$committee->id}}" >
                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="name" class="col-form-label">Comissão</label>
                        <input id="name"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{is_null(old('name')) ? $committee->name : old('name') }}"
                               disabled=disabled>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                          </div>



                        <div class="col-md-6">
                            <label for="short_name" class="col-form-label">Nome Serviço</label>
                            <input id="short_name"
                                   class="form-control{{ $errors->has('short_name') ? ' is-invalid' : '' }}" name="short_name"
                                   value="{{is_null(old('short_name')) ? $committeeService->short_name : old('short_name') }}"
                                    @include('partials.disabled',['model'=>$committeeService])>
                            @if ($errors->has('short_name'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('short_name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="link_caption" class="col-form-label">Nome na Tela</label>
                            <input id="link_caption"
                                   class="form-control{{ $errors->has('link_caption') ? ' is-invalid' : '' }}" name="link_caption"
                                   value="{{is_null(old('link_caption')) ? $committeeService->link_caption : old('link_caption') }}"
                                    @include('partials.disabled',['model'=>$committeeService])>
                            @if ($errors->has('link_caption'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('link_caption') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="col-md-2">
                            <label for="public" class="col-form-label">Aberta ao Público</label>

                            <p class="checkbox">
                                <input type="hidden" name="public" value="0">
                                <input id="public" type="checkbox" name="public" {{old('public')
                            || $committeeService->public ? 'checked="checked"' : ''}}
                                    @include('partials.disabled',['model'=>$committeeService])>
                                @if ($errors->has('public'))
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('public') }}</strong> </span>
                                @endif
                            </p>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="phone" class="col-form-label">Telefone</label>
                            <input id="phone"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                   value="{{is_null(old('phone')) ? $committeeService->phone : old('phone') }}"
                                @include('partials.disabled',['model'=>$committeeService])>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input id="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{is_null(old('email')) ? $committeeService->email : old('email') }}"
                                @include('partials.disabled',['model'=>$committeeService])>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="bio" class="col-form-label">Descrição</label>
                        <textarea id="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"
                                  name="bio"
                                @include('partials.disabled',['model'=>$committeeService])>{{is_null(old('bio')) ? $committeeService->bio : old('bio') }}</textarea>
                            @if ($errors->has('bio'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    @include('partials.edit-button',['model'=>$committeeService])

                    <button type="submit" class="btn btn-danger" @include('partials.disabled',['model'=>$committeeService]) id="save_button">
                        <i class="far fa-save"></i> Gravar
                    </button>

                    <button id="cancelButton" class="btn btn-danger" v-on:click.prevent="cancel()"  :disabled="!(isEditing || isCreating)">
                        Cancelar
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
