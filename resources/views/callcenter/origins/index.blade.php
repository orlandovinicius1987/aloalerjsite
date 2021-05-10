@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="vue-origins-search">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-7 col-md-4">
                    <h3>
                        <i class="fas fa-globe-americas"></i> Origens
                    </h3>
                </div>

                <div class="col-12 col-md-8 text-right">
                    <input
                        type="text"
                        id="search"
                        placeholder="Assuntos"
                        v-model="form.search"
                        @keyup="typeKeyUp"
                    >&nbsp;&nbsp;
                    @can('origins:store')
                        <a id="buttonNovaOrigem" href="{{ route('origins.create') }}"
                           class="btn btn-primary btn-sm pull-right">
                            <i class="fa fa-plus"></i>
                            Nova Origem
                        </a>
                    @endCan
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('callcenter.origins.partials.table')
        </div>
    </div>

@endsection
