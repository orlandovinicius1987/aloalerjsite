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

                        <div class="col-8 text-right" v-if="form.search && (foundBy != 'cpf_cnpj')">
                            <a v-bind:href="'{{ route('people.create') }}/'+form.search" class="btn btn-primary btn-sm float-right">
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

                                    <input
                                        type="text" class="form-control"
                                        name="pesquisa"
                                        placeholder="digite CPF, CNPJ ou nome"
                                        v-model="form.search"
                                        @keyup="typeKeyUp"
                                    >
                                    <br>
                                    <div class="alert alert-danger" role="alert" v-if="errors">
                                        @{{ errors }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card mt-4" v-if="form.search && tables.people && !errors">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h5>Resultado</h5>
                        </div>
                    </div>
                </div>

                @include('callcenter.people.partials.table')
            </div>
        </div>
    </div>
@endsection
