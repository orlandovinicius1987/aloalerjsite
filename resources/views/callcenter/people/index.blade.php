@extends('layouts.app')

@section('vue-app-name', 'vue-search')

@section('heading')
    @parent

    <div v-cloak>
        <div class="mt-4">
            <div class="">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="form-group text-center">

                            <h2 class="section-title">
                                <i class="fas fa-search"></i> Pesquisar
                            </h2>

                            <div class="form-bigger">
                                <div class="form-group row search">
                                    <div class="col-12">
                                        <input
                                                id="search"
                                                class="form-control"
                                                placeholder="Nome, CPF, CNPJ ou Protocolo"
                                                v-model="form.search.search"
                                                @keyup="typeKeyUp"
                                        >
                                    </div>
                                </div>

                                <div class="form-group row text-center">
                                    <div class="col-12" v-if="canCreateNewPerson()">
                                        <a dusk="cadastrarNovoCidadaoButton" v-bind:href="'{{ route('people.create') }}?cpf_cnpj='+getCpfCnpj()+'&name='+getName()" class="btn btn-primary btn-depth ">
                                            <i class="fa fa-plus"></i>
                                            Cadastrar novo cidadão
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div v-cloak>
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h1 v-if="refreshing">
                    <i class="fa fa-spinner fa-spin text-danger"></i>
                </h1>
            </div>
        </div>

        @include('callcenter.people.partials.table')
    </div>
@endsection
