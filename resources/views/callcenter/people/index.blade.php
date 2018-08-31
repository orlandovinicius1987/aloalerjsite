@extends('layouts.app')

@section('content')
    <div id="vue-search">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-4">
                        <h5>{{ __('Pesquisar pessoas') }}</h5>
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
                        <h5>{{ __('Resultado') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12" v-if="tables.people.length === 0">
                        <h1 class="text-center">Nenhum resultado encontrado</h1>
                    </div>

                    <div class="col-12" v-if="tables.people.length > 0">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Endereços</th>
                                <th scope="col">Contatos</th>
                                <th scope="col">Protocolos</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="person in tables.people">
                                <td>
                                    <a :href="'/callcenter/people/show/' + person.id">@{{ person.name }}</a>
                                </td>

                                <!--<td v-html="person.cpf_cnpj"></td>-->
                                <td>
                                    <a :href="'/callcenter/people/show/' + person.id">@{{ person.cpf_cnpj }}</a>
                                </td>

                                <td>
                                    <p v-for="address in person.addresses">
                                        @{{ address.street }}
                                    </p>
                                </td>

                                <td>
                                    <p v-for="contact in person.contacts">
                                        @{{ contact.contact }}
                                    </p>
                                </td>

                                <td>
                                    <p v-for="record in person.records">
                                        <a :href="'/callcenter/records/show/' + record.id">@{{ record.protocol }}</a>
                                    </p>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
