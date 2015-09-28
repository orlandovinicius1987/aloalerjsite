@extends('layouts.master')

@section('contents')
    {!! Form::open(array('url' => 'foo/bar')) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('question', 'Sua pergunta') !!}
            {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sendto', 'Destino') !!}
            {!!
                Form::select('size',
                    [
                        '08000220008' => 'Alô Alerj (Online)',
                        '08002827060' => 'Defesa do Consumidor (Online)',
                        '08002820230' => 'Denúncia Meio Ambiente (Online)',
                        '08002820802' => 'Disque Preconceitos (Online)',
                        '08002826582' => 'Pirataria (Online)',
                        '08002855005' => 'Disque PPD (Online)',
                        '08002828815' => 'Saneamento Ambiental (Online)',
                        '08002823135' => 'Segurança Pública (Online)',
                    ], null, ['class' => 'form-control']
                )
            !!}
        </div>

        <button type="submit" class="btn btn-primary">Entrar no chat</button>
{!! Form::close() !!}
@stop
