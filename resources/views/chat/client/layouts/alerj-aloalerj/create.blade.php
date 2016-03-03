@extends("chat.client.layouts.master.layout")

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::opener(['route' => 'chat.client.store',null,'class' => 'form-signin'], []) !!}
                    {!! Form::hidden('clientId', $clientId) !!}
                    {!! Form::hidden('layout', $layout) !!}

                    <h2 class="form-signin-heading">{{ $businessClientName }} - Chat</h2>

                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome completo', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                    <br>

                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail', 'required' => 'required']) !!}

                    <br>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar no chat</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
