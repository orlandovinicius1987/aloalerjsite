@extends('contact.layout')

@section('content-main')
    {!! Form::open(['url' => '/contact', 'class' => 'form-horizontal']) !!}
        <fieldset>
            <!-- Form Name -->
            <legend class="form-intro">
                Caso tenha algum comentário, pergunta ou denúncia a fazer, por favor use o formulário abaixo.
            </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nome">Nome</label>
                <div class="col-md-8">
                    {!! Form::text('name', null, ['placeholder' => 'Digite seu nome completo', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                    {!! Form::email('email', null, ['placeholder' => 'Digite seu e-mail', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Telefone</label>
                <div class="col-md-8">
                    {!! Form::text('telephone', null, ['placeholder' => 'Digite seu telefone', 'class' => 'form-control input-md', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="assunto">Assunto</label>
                <div class="col-md-8">
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
                <label class="col-md-3 control-label" for="mensagem">Mensagem</label>
                <div class="col-md-8">
                    {!! Form::textarea('message', null, ['placeholder' => 'Digite sua mensagem', 'class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="send"></label>
                <div class="col-md-4">
                    <button id="send" name="send" class="btn btn-primary">Enviar mensagem</button>
                </div>
            </div>
        </fieldset>
    {!! Form::close() !!}
@stop
