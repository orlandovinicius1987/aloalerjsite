@extends('layouts.master')

@section('content-main')
    <div id="vue-phones">
        <div class="page-name">
            <h1 class="nome-pagina mt-5 mb-5">Telefones Úteis</h1>
        </div>

        <div class="texto-pages telefones-uteis">
            <div class="row d-lg-none">
                <div class="col-12 offset-sm-2 col-sm-8">
                    <div class="input-group c-search">
                        <input v-model="filter" class="form-control" id="contact-list-search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fas fa-search text-muted"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" data-masonry='{"percentPosition": true }' id="contact-list">
            <div class="col-sm-12 col-lg-4 mb-4"  v-for="phone in filteredPhones">
                <div class="card">
                    <div class="card-body">
                        <p class="label-contato"><strong>@{{ phone.label }}</strong></p>
                        <p class="info-contato">@{{ phone.name }}</p>
                        <span class="tel-contato" v-for="number in phone.phones">
                            <span class="glyphicon glyphicon-earphone c-info"></span><strong>@{{ number }}</strong>
                            <span> @{{ phone.obs }} </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
