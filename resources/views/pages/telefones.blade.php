@extends('layouts.master')

@section('content-main')
    <div id="vue-phones">
        <div class="page-name">
            <h1 class="nome-pagina">Telefones Úteis</h1>
        </div>

        <div class="texto-pages telefones-uteis">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                        <div class="panel panel-default">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group c-search">
                                        <input v-model="filter" class="form-control" id="contact-list-search">
                                        <span class="input-group-btn">
							                <button class="btn btn-default" type="button">
                                                <span class="glyphicon glyphicon-search text-muted"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <ul class="list-group" id="contact-list">
                                        <li class="list-group-item" v-for="phone in filteredPhones">
                                            <div class="contato col-xs-12" id="letra-a">
                                                <p class="label-contato"><strong>@{{ phone.label }}</strong></p>
                                                <p class="info-contato">@{{ phone.name }}</p>
                                                <span class="tel-contato" v-for="number in phone.phones">
                                                    <span class="glyphicon glyphicon-earphone c-info"></span><strong>@{{ number }}</strong>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
