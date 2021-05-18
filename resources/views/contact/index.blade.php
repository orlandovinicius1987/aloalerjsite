@extends('contact.layout')

@section('content-main')


    <div class="row g-3 mb-5">
        <div class="col-12">
            <h1 class="mt-5 mb-4">
                Contato
            </h1>
            <h3 class="mb-4">
                Preencha os campos e envie sua mensagem para que possamos iniciar o seu atendimento.
            </h3>
        </div>


        <div class="col-md-12 col-lg-10 offset-lg-1 mt-3 pt-2 pb-3">
            <div class="" id="vue-contact-form">

{{--
                <h4 class="mb-3">
                    Dados Pessoais
                </h4>
--}}
                {!! Form::open(['url' => '/contact', 'class' => 'form-horizontal']) !!}

                <div class="row g-3">

                    <div class="mb-3 col-md-12 col-lg-6">
                        <label class="form-label" for="nome">Nome</label>
                        <input id="name" placeholder="Digite seu nome completo"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-md"
                               name="name" value="{{is_null(old('name')) ? '' : old('name') }}"
                               required
                        >
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="email">E-mail</label>
                        <input type=email class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               id="email"
                               value="{{is_null(old('email')) ? '' : old('email') }}"
                               placeholder = 'Digite seu e-mail'
                        >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }} input-md"
                               id="telephone"
                               name="telephone"
                               value="{{is_null(old('telephone')) ? '' : old('telephone') }}"
                               v-mask='["(##)####-####", "(##)#####-####"]'
                               v-model='form.telephone'
                               v-init:telephone="'{{is_null(old('telephone')) ? '' : old('telephone')}}'"
                               placeholder="Digite seu telefone"
                               required
                        >

                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="cpf">CPF</label>
                        <div>
                            <input id="cpf" type="cpf" placeholder="Digite seu CPF"
                                   class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} input-md "
                                   name="cpf"
                                   value="{{is_null(old('cpf')) ? '' : old('cpf') }}"
                                   required
                                   v-mask='["###.###.###-##"]'
                            >
                            @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="scholarship">Data de nascimento</label>
                        <div>
                            <input class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }} input-md"
                                   id="birthdate"
                                   name="birthdate"
                                   type=date
                                   value="{{is_null(old('birthdate')) ? '' : old('birthdate') }}"
                                   v-mask='["##/##/####"]'
                                   v-model='form.telephone'
                                   v-init:telephone="'{{is_null(old('birthdate')) ? '' : old('birthdate')}}'"
                                   placeholder="Nascimento"

                            >

                            @if ($errors->has('birthdate'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birthdate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="scholarship">Sexo</label>
                        <div>
                            {!!
                                Form::select('sex_1', \App\Services\Sex::all(1), null, ['class' => 'form-control form-select'])
                            !!}
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="scholarship">Identidade de gênero</label>
                        <div>
                            {!!
                                Form::select('sex_2', \App\Services\Sex::all(2), null, ['class' => 'form-control form-select'])
                            !!}
                        </div>
                    </div>
                    <div class="mb-3 col-md-12 col-lg-6">
                        <label class="form-label" for="nome">Nome Social *  </label>
                        <input id="name-social" placeholder="Digite seu nome social - campo opcional"
                               class="form-control{{ $errors->has('name-social') ? ' is-invalid' : '' }} input-md"
                               name="name-social" value="{{is_null(old('name-social')) ? '' : old('name-social') }}"
                               
                        >
                    </div>



                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="identidade">Identidade</label>
                        <input id="identidade" placeholder="Digite sua Identidade"
                               class="form-control{{ $errors->has('identidade') ? ' is-invalid' : '' }}  input-md"
                               name="identidade"
                               value="{{is_null(old('identidade')) ? '' : old('identidade') }}"

                        >
                        @if ($errors->has('identidade'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identidade') }}</strong>
                                </span>
                        @endif
                    </div>

                    {{--
                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="expeditor">Orgão Expeditor</label>
                        <input id="expeditor"
                               class="form-control{{ $errors->has('expeditor') ? ' is-invalid' : '' }}  input-md"
                               name="expeditor"
                               value="{{is_null(old('expeditor')) ? '' : old('expeditor') }}"

                               placeholder = 'Orgão Expeditor'
                        >
                        @if ($errors->has('expeditor'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('expeditor') }}</strong>
                                </span>
                        @endif
                    </div>


                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="scholarship">Escolaridade</label>
                        {!!
                            Form::select('scholarship', \App\Services\Scholarship::all(), null, ['class' => 'form-control  form-select'])
                        !!}
                    </div>

                    <div class="mb-3 col-md-6 col-lg-3">
                        <label class="form-label" for="area">Àrea de Atuação</label>
                        {!! Form::text('area', null, ['placeholder' => 'Àrea de Atuação', 'class' => 'form-control input-md' ]) !!}
                    </div>
--}}

                    <div class="mb-3 col-md-3 col-lg-3">
                        <label class="form-label" for="cep">C.E.P.</label>
                        <input id="cep"
                               name="cep"
                               v-model="form.cep"
                               v-init:cep="'{{is_null(old('cep')) ? '' : old('cep') }}'"
                               value="{{is_null(old('cep')) ? '' : old('cep') }}"
                               class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }} input-md"
                               @keyup="typeKeyUp"
                               v-mask='["##.###-###"]'
                               placeholder="CEP"

                        >
                        @if ($errors->has('cep'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-6 col-lg-6">
                        <label class="form-label" for="rua">Rua</label>
                        <input id="rua"
                               name="rua"
                               v-model="form.rua"
                               v-init:rua="'{{is_null(old('rua')) ? '' : old('rua') }}'"
                               value="{{is_null(old('rua')) ? '' : old('rua') }}"
                               class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }} input-md"

                               placeholder="Rua"
                        >
                        @if ($errors->has('rua'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rua') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-3 col-lg-3">
                        <label class="form-label" for="numero">Número</label>
                        {!! Form::text('numero', null, ['placeholder' => 'Número', 'class' => 'form-control input-md']) !!}
                    </div>

                    <div class="mb-3 col-md-4 col-lg-3">
                        <label class="form-label" for="complemento">Complemento</label>
                        {!! Form::text('complemento', null, ['placeholder' => 'Complemento', 'class' => 'form-control input-md']) !!}
                    </div>

                    <div class="mb-3 col-md-4 col-lg-6">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input id="bairro"
                               name="bairro"
                               v-model="form.bairro"
                               v-init:bairro="'{{is_null(old('bairro')) ? '' : old('bairro') }}'"
                               value="{{is_null(old('bairro')) ? '' : old('bairro') }}"
                               class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}  input-md"

                               placeholder="Bairro"
                        >
                        @if ($errors->has('bairro'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bairro') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-4 col-lg-6">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input id="cidade"
                               name="cidade"
                               v-model="form.cidade"
                               v-init:cidade="'{{is_null(old('cidade')) ? '' : old('cidade') }}'"
                               value="{{is_null(old('cidade')) ? '' : old('cidade') }}"
                               class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}"

                               placeholder="Cidade"
                        >
                        @if ($errors->has('cidade'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3 col-md-12 col-lg-12">
                        <label class="form-label" for="assunto">Tipo</label>
                        {!!
                            Form::select('record_type_id', $recordTypes, null, ['class' => 'form-control form-select'])
                        !!}
                    </div>

                    <div class="mb-3 col-md-12 col-lg-12">
                        <label class="form-label" for="mensagem">Mensagem</label>
                        <textarea id="message" placeholder="Digite sua mensagem"
                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                  name="message"
                                  value="{{is_null(old('message')) ? '' : old('message') }}"
                                  required
                                  cols="50"
                                  rows="10"
                        >
                    </textarea>
                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="send"></label>
                        <div class="col-md-12  pull-right">
                            <button id="send" name="send" class="btn btn-primary btn-lg btn-block iniciar-conversa enviar-mensagem">Enviar mensagem</button>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>


    </div>








    {{--
        <hr class="my-5">
        <!-----------   FORMULARIO ANTIGO INICIO   ----------->
        {!! Form::open(['url' => '/contact', 'class' => 'form-horizontal']) !!}
        <div id="vue-contact-form">
            <fieldset>
                <!-- Form Name -->
                <h1 class="form-intro mb-4">
                    Preencha os campos e envie sua mensagem para que possamos iniciar o seu atendimento.
                </h1>

                <!-- Text input-->

                <div class="form-group">
                    <div class="col-md-12">
                        <label class="form-label" for="nome">Nome</label>
                        <input id="name" placeholder="Digite seu nome completo"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-md"
                               name="name" value="{{is_null(old('name')) ? '' : old('name') }}"
                               required
                        >
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="form-label" for="email">Email</label>
                        <input type=email class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               id="email"
                               value="{{is_null(old('email')) ? '' : old('email') }}"
                               placeholder = 'Digite seu e-mail'
                        >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }} input-md"
                               id="telephone"
                               name="telephone"
                               value="{{is_null(old('telephone')) ? '' : old('telephone') }}"
                               v-mask='["(##)####-####", "(##)#####-####"]'
                               v-model='form.telephone'
                               v-init:telephone="'{{is_null(old('telephone')) ? '' : old('telephone')}}'"
                               placeholder="Digite seu telefone"
                               required
                        >

                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <!-- Text input-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label sr-only" for="cpf">CPF</label>
                        <div>
                            <input id="cpf" type="cpf" placeholder="Digite seu CPF"
                                   class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} input-md "
                                   name="cpf"
                                   value="{{is_null(old('cpf')) ? '' : old('cpf') }}"
                                   required
                                   v-mask='["###.###.###-##"]'
                            >

                            @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label sr-only" for="scholarship">Data de nascimento</label>
                        <div>
                            <input class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }} input-md"
                                   id="birthdate"
                                   name="birthdate"
                                   type=date
                                   value="{{is_null(old('birthdate')) ? '' : old('birthdate') }}"
                                   v-mask='["##/##/####"]'
                                   v-model='form.telephone'
                                   v-init:telephone="'{{is_null(old('birthdate')) ? '' : old('birthdate')}}'"
                                   placeholder="Nascimento"

                            >

                            @if ($errors->has('birthdate'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label sr-only" for="scholarship">Sexo</label>
                        <div>
                            {!!
                                Form::select('sex_1', \App\Services\Sex::all(1), null, ['class' => 'form-control'])
                            !!}
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label sr-only" for="scholarship">Identidade de gênero</label>
                        <div>
                            {!!
                                Form::select('sex_2', \App\Services\Sex::all(2), null, ['class' => 'form-control'])
                            !!}
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label" for="identidade">Identidade</label>
                            <div class="col-md-12">
                                <input id="identidade" placeholder="Digite sua Identidade"
                                       class="form-control{{ $errors->has('identidade') ? ' is-invalid' : '' }}  input-md"
                                       name="identidade"
                                       value="{{is_null(old('identidade')) ? '' : old('identidade') }}"

                                >

                                @if ($errors->has('identidade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('identidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="expeditor">Orgão Expeditor</label>
                            <div class="col-md-12">
                                <input id="expeditor"
                                       class="form-control{{ $errors->has('expeditor') ? ' is-invalid' : '' }}  input-md"
                                       name="expeditor"
                                       value="{{is_null(old('expeditor')) ? '' : old('expeditor') }}"

                                       placeholder = 'Orgão Expeditor'
                                >

                                @if ($errors->has('expeditor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('expeditor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-6 control-label  sr-only" for="scholarship">Escolaridade</label>
                    <div class="col-md-12">
                        {!!
                            Form::select('scholarship', \App\Services\Scholarship::all(), null, ['class' => 'form-control'])
                        !!}
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="form-label" for="area">Àrea de Atuação</label>
                    <div class="col-md-12">
                        {!! Form::text('area', null, ['placeholder' => 'Àrea de Atuação', 'class' => 'form-control input-md' ]) !!}
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">


                    <label class="form-label" for="cep">C.E.P.</label>
                    <div class="col-md-12">
                        <input id="cep"
                               name="cep"
                               v-model="form.cep"
                               v-init:cep="'{{is_null(old('cep')) ? '' : old('cep') }}'"
                               value="{{is_null(old('cep')) ? '' : old('cep') }}"
                               class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }} input-md"
                               @keyup="typeKeyUp"
                               v-mask='["##.###-###"]'
                               placeholder="CEP"

                        >

                        @if ($errors->has('cep'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cep') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>



                <!-- Text input-->
                <div class="form-group">
                    <label class="form-label" for="rua">Rua</label>
                    <div class="col-md-12">
                        <input id="rua"
                               name="rua"
                               v-model="form.rua"
                               v-init:rua="'{{is_null(old('rua')) ? '' : old('rua') }}'"
                               value="{{is_null(old('rua')) ? '' : old('rua') }}"
                               class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }} input-md"

                               placeholder="Rua"
                        >

                        @if ($errors->has('rua'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rua') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="form-label" for="numero">Número</label>
                    <div class="col-md-12">
                        {!! Form::text('numero', null, ['placeholder' => 'Número', 'class' => 'form-control input-md']) !!}
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="form-label" for="complemento">Complemento</label>
                    <div class="col-md-12">
                        {!! Form::text('complemento', null, ['placeholder' => 'Complemento', 'class' => 'form-control input-md']) !!}
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="form-label" for="bairro">Bairro</label>
                    <div class="col-md-12">
                        <input id="bairro"
                               name="bairro"
                               v-model="form.bairro"
                               v-init:bairro="'{{is_null(old('bairro')) ? '' : old('bairro') }}'"
                               value="{{is_null(old('bairro')) ? '' : old('bairro') }}"
                               class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}  input-md"

                               placeholder="Bairro"
                        >

                        @if ($errors->has('bairro'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">

                    <label class="form-label" for="cidade">Cidade</label>
                    <div class="col-md-12">
                        <input id="cidade"
                               name="cidade"
                               v-model="form.cidade"
                               v-init:cidade="'{{is_null(old('cidade')) ? '' : old('cidade') }}'"
                               value="{{is_null(old('cidade')) ? '' : old('cidade') }}"
                               class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}"

                               placeholder="Cidade"
                        >

                        @if ($errors->has('cidade'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                        @endif
                    </div>

                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-6 control-label  sr-only" for="assunto">Assunto</label>
                    <div class="col-md-12">
                        {!!
                            Form::select('record_type_id', $recordTypes, null, ['class' => 'form-control'])
                        !!}
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-6 control-label  sr-only" for="mensagem">Mensagem</label>
                    <div class="col-md-12">
                        <textarea id="message" placeholder="Digite sua mensagem"
                                  class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                  name="message"
                                  value="{{is_null(old('message')) ? '' : old('message') }}"
                                  required
                                  cols="50"
                                  rows="10"
                        >
                        </textarea>

                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="send"></label>
                    <div class="col-md-4  pull-right">
                        <button id="send" name="send" class="btn btn-primary btn-lg btn-block iniciar-conversa enviar-mensagem">Enviar mensagem</button>
                    </div>
                </div>
            </fieldset>
        </div>
        {!! Form::close() !!}
        <!-----------   FIM FORMULARIO ANTIGO   ----------->
    --}}

@stop
