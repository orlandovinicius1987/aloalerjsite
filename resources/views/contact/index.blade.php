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
                <label class="col-md-3 control-label sr-only" for="email">Telefone</label>
                <div class="col-md-12">
                    {!! Form::text('telephone', null, ['placeholder' => 'Digite seu telefone', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label  sr-only" for="assunto">Assunto</label>
                <div class="col-md-12">
                    {!!
                        Form::select('size',
                            [
                                'A' => 'Ajuda',
                                'P' => 'Pergunta',
                                'S' => 'Sugestão',
                                'E' => 'Elogio',
                                'D' => 'Denúncia',
                                'R' => 'Reclamação',
                            ]
                        , null, ['class' => 'form-control'])
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
