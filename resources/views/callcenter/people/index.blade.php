@extends('layouts.app')

@section('content')
    <div id="vue-search">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5>{{ __('Persons') }}</h5>
                </div>

                <div class="col-8 text-right">
                    <a href="{{ route('persons.create') }}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-plus"></i>
                        Cadastrar novo cidadão
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if(session()->has('warning'))
                        <div class="alert alert-warning">
                            {{ session()->get('warning') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <form action="{{ route('persons.index') }}" id="searchForm">
                            <div class="form-group">
                                <label for="pesquisa">Pesquisar</label>

                                <input
                                    type="text" class="form-control"
                                    name="pesquisa"
                                    placeholder="digite o CPF a ser pesquisado"
                                    v-model="form.search"
                                    @keyup="typeKeyUp"
                                    v-mask='["###.###.###-##", "##.###.###/####-##"]'
                                >
                            </div>

                            <div
                                class="btn btn-primary btn-sm input-group-addon" id="searchButton"
                                onClick="javascript:document.getElementById('searchForm').submit();"
                            >
                                <i class="fa fa-search"></i> Pesquisar
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
