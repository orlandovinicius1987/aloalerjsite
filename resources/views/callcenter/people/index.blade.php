@extends('layouts.app')

@section('content')
    <div id="vue-search">
        <div v-cloak>
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h5>Pesquisar pessoas</h5>
                        </div>

                        <div class="col-8 text-right" v-if="isSearching() && !foundByCpfCnpj">
                            <a v-bind:href="'{{ route('people.create') }}?cpf_cnpj='+form.search.cpf_cnpj+'&name='+form.search.name" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-plus"></i>
                                Cadastrar novo cidadão
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="pesquisa">Pesquisar</label>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <input
                                                type="text" class="form-control"
                                                placeholder="digite CPF, CNPJ ou Protocolo"
                                                v-model="form.search.cpf_cnpj"
                                                @keyup="typeKeyUp"
                                        >
                                    </div>

                                    <div class="col-8">
                                        <input
                                                type="text" class="form-control"
                                                placeholder="digite o nome"
                                                v-model="form.search.name"
                                                @keyup="typeKeyUp"
                                        >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <div class="alert alert-danger text-center" role="alert" v-if="errors">
                                            @{{ errors }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5>Resultado</h5>
                        </div>

                        <div class="col-6 text-right">
                            <h5 v-if="refreshing">
                                <i class="fa fa-spinner fa-spin text-danger"></i>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('callcenter.people.partials.table')
                </div>
            </div>
        </div>
    </div>
@endsection
