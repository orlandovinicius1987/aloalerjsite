@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Fale com a Alerj</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg visible-md"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend class="form-intro">Caso tenha algum comentário, pergunta ou denúncia a fazer, por favor use o formulário abaixo.
            </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nome">Nome</label>
                <div class="col-md-8">
                    <input id="nome" name="nome" type="text" placeholder="Insira o seu nome" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <input id="email" name="email" type="text" placeholder="insira o seu email" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="assunto">Assunto</label>
                <div class="col-md-8">
                    <select id="assunto" name="assunto" class="form-control">
                        <option value="Pergunta">Pergunta</option>
                        <option value="Sugestão">Sugestão</option>
                        <option value="Ajuda">Ajuda</option>
                        <option value="Denuncia">Denuncia</option>
                        <option value="Reclamação">Reclamação</option>
                        <option value="Elogio">Elogio</option>
                    </select>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="mensagem">Mensagem</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="mensagem" name="mensagem">insira a sua mensagem</textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="send"></label>
                <div class="col-md-4">
                    <button id="send" name="send" class="btn btn-primary">Enviar</button>
                </div>
            </div>

        </fieldset>
    </form>


@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'FALE COM A ALERJ',
         'telephone' => '0800 023 0007',
         'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
     ])
@stop
