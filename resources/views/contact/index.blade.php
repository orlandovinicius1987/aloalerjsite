@extends('contact.layout')

@section('content-main')
    {!! Form::open(['url' => '/contact', 'class' => 'form-horizontal']) !!}
        <fieldset>
            <!-- Form Name -->
            <h1 class="form-intro">
                Preencha os campos e envie sua mensagem para que possamos iniciar o seu atendimento.
            </h1>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="nome">Nome</label>
                <div class="col-md-12">
                    {!! Form::text('name', null, ['placeholder' => 'Digite seu nome completo', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="email">Email</label>
                <div class="col-md-12">
                    {!! Form::email('email', null, ['placeholder' => 'Digite seu e-mail', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="telefone">Telefone</label>
                <div class="col-md-12">
                    {!! Form::text('telephone', null, ['placeholder' => 'Digite seu telefone', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="cpf">CPF</label>
                <div class="col-md-12">
                    {!! Form::text('cpf', null, ['placeholder' => 'Digite seu CPF', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">

                <div class="row">
                    <div class="col-md-6">
                        <label class="col-md-3 control-label sr-only" for="identidade">Identidade</label>
                        <div class="col-md-12">
                            {!! Form::text('identidade', null, ['placeholder' => 'Digite sua Identidade', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="col-md-3 control-label sr-only" for="expeditor">Orgão Expeditor</label>
                        <div class="col-md-12">
                            {!! Form::text('expeditor', null, ['placeholder' => 'Orgão Expeditor', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>

            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label  sr-only" for="scholarship">Escolaridade</label>
                <div class="col-md-12">
                    {!!
                        Form::select('scholarship', \App\Services\Scholarship::all(), null, ['class' => 'form-control'])
                    !!}
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="area">Àrea de Atuação</label>
                <div class="col-md-12">
                    {!! Form::text('area', null, ['placeholder' => 'Àrea de Atuação', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>


            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label  sr-only" for="sex">Sexo</label>
                <div class="col-md-12">
                    {!!
                        Form::select('subject', \App\Services\Sex::all(), null, ['class' => 'form-control'])
                    !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="cep">C.E.P.</label>
                <div class="col-md-12">
                    {!! Form::text('cep', null, ['placeholder' => 'CEP', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="rua">Rua</label>
                <div class="col-md-12">
                    {!! Form::text('rua', null, ['placeholder' => 'Rua', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="numero">Número</label>
                <div class="col-md-12">
                    {!! Form::text('numero', null, ['placeholder' => 'Número', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="complemento">Complemento</label>
                <div class="col-md-12">
                    {!! Form::text('complemento', null, ['placeholder' => 'Complemento', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="bairro">Bairro</label>
                <div class="col-md-12">
                    {!! Form::text('bairro', null, ['placeholder' => 'Bairro', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label sr-only" for="cidade">Cidade</label>
                <div class="col-md-12">
                    {!! Form::text('cidade', null, ['placeholder' => 'Cidade', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>



            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label  sr-only" for="assunto">Assunto</label>
                <div class="col-md-12">
                    {!!
                        Form::select('subject', \App\Services\Subject::all(), null, ['class' => 'form-control'])
                    !!}
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label  sr-only" for="mensagem">Mensagem</label>
                <div class="col-md-12">
                    {!! Form::textarea('message', null, ['placeholder' => 'Digite sua mensagem', 'class' => 'form-control', 'required' => 'required']) !!}
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
    {!! Form::close() !!}
@stop
