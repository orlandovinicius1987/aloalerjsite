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
                                    <div class="input-group">
                                        <input dusk="search" id="search" class="form-control" placeholder="Nome, CPF, CNPJ ou Protocolo" v-model="form.search.search" @keyup="typeKeyUp">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span v-if="refreshing">
                                                    <i class="fa fa-lg fa-spinner fa-spin text-danger"></i>
                                                </span>

                                                <span v-else>
                                                    <i class="fa fa-lg fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div :class="'col-' + (canCreateNewPerson() ? '6' : '12')">
                                    <a dusk="cadastrarNovoCidadaoButton" v-bind:href="'{{ route('records.create', ['person_id' => $anonymous_id]) }}'" class="btn btn-primary ">
                                        <i class="fa fa-plus"></i>
                                        Protocolo Anônimo
                                    </a>
                                </div>




                                <div :class="'col-' + (canCreateNewPerson() ? '6' : '12')" v-if="canCreateNewPerson()">
                                    <a dusk="cadastrarNovoCidadaoButton" v-bind:href="'{{ route('people.create') }}?cpf_cnpj='+getCpfCnpj()+'&name='+getName()" class="btn btn-primary ">
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
    @include('callcenter.people.partials.table')
</div>
@endsection