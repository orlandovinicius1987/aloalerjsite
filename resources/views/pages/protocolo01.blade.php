@extends('layouts.master')



@section('content-main')
    <div class="page-name">
        <h1 class="nome-pagina">Insira o número de seu protocolo</h1>
    </div>
    <div class="texto-pages">
        <form class="form-horizontal">
            <fieldset>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="nProtocolo">Nº de Protocolo</label>
                    <div class="col-md-8">
                        <input name="nProtocolo" class="form-control input-md" id="nProtocolo" required="" type="text" placeholder="">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="sFator">Segundo Fator</label>
                    <div class="col-md-8">
                        <input name="sFator" class="form-control input-md" id="sFator" required="" type="text" placeholder="">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="btnLogin"></label>
                    <div class="col-md-8">
                        <button name="btnLogin" class="btn btn-primary" id="btnLogin">Ver Processo</button>
                    </div>
                </div>
                <!-- Obs -->
                <div class="">
                    <label class="col-md-3 " for=""></label>
                    <div class="col-md-8">
                        * Observação
                    </div>
                </div>

            </fieldset>
        </form>


    </div>

@stop
