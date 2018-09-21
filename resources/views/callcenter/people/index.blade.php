@extends('layouts.app')

@section('content')
    <div id="vue-search">
        <div v-cloak>
            <div class="mt-4">
                <div class="">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group text-center">

                                <div class="section-title">
                                    <label for="pesquisa"><i class="fas fa-search"></i> Pesquisar</label>
                                </div>

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

                                <div class="form-group text-center row">
                                    <div class="col-12 text-center"  v-if="canCreateNewPerson()">
                                        <a v-bind:href="'{{ route('people.create') }}?cpf_cnpj='+getCpfCnpj()+'&name='+getName()" class="btn btn-primary btn-depth ">
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

            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 v-if="refreshing">
                        <i class="fa fa-spinner fa-spin text-danger"></i>
                    </h1>
                </div>
            </div>

            @include('callcenter.people.partials.table')
        </div>
    </div>
@endsection
