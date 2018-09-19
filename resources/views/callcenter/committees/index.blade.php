@extends('layouts.app')

@section('content')
    <div class="card mt-4" id="committees-search">
        <div class="card-header">

            <div class="row align-items-center">
                <div class="col-4">
                    <h5>
                        Comissões
                    </h5>
                </div>

                <div class="col-8 text-right">
                    <input
                            type="text"
                            placeholder="Comissões"
                            v-model="form.search"
                            @keyup="typeKeyUp"
                    >&nbsp;&nbsp;
                    <a id="buttonEndereços" href="{{ route('committees.create') }}"
                       class="btn btn-primary btn-sm pull-right btn-depth">
                        <i class="fa fa-plus"></i>
                        Nova Commissão
                    </a>
                </div>
            </div>
        </div>
    @include('callcenter.committees.partials.table')
    </div>
@endsection
