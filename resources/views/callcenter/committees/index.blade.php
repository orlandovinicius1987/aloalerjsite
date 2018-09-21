@extends('layouts.app')

@section('content')






    <div class="row">

        <div class="col-1 bg-colored-blue-darker100 square">

        </div>

        <div class="col-1 bg-colored-blue-darker75 square">

        </div>

        <div class="col-1 bg-colored-blue-darker50 square">

        </div>

        <div class="col-1 bg-colored-blue-darker25 square">

        </div>

        <div class="col-1 bg-colored-blue-lighter95 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter90 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter85 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter80 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter75 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter70 square">

        </div>

        <div class="col-1 bg-colored-blue-lighter65 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter60 square">

        </div>

    </div>

    <div class="row">

        <div class="col-1 bg-colored-blue-lighter55 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter50 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter45 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter40 square">

        </div>

        <div class="col-1 bg-colored-blue-lighter35 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter30 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter25 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter20 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter15 square">

        </div>
        <div class="col-1 bg-colored-blue-lighter10 square">

        </div>





    </div>


    <div class="card mt-4" id="committees-search">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-4">
                    <h2>
                        <i class="fas fa-layer-group"></i> Comissões
                    </h2>
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
        <div class="card-body">
            @include('callcenter.committees.partials.table')
        </div>
    </div>
@endsection
