@extends('layouts.app')

@section('content')


    <div class="card mt-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-4">
                    <h2>
                        <i class="fas fa-layer-group"></i> Comissões
                    </h2>
                </div>
                <div class="col-8 text-right">
                    <a id="buttonEndereços" href="{{ route('committees.create') }}"
                       class="btn btn-primary btn-sm pull-right btn-depth">
                        <i class="fa fa-plus"></i>
                        Nova Commissão
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('callcenter.committees.partials.table')
    </div>




@endsection




