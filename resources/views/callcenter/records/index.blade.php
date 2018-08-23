@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h5>
                        {{ __('Protocolos') }}
                    </h5>
                </div>

                <div class="col-8 text-right">
                    @if(isset($person))
                        <a id="buttonAndamentos"
                           href="{{ route('records.create',['person_id'=>$person->id]) }}"
                           class="btn btn-primary btn-sm pull-right"
                        >
                            <i class="fa fa-plus"></i>
                            Novo Protocolo
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('callcenter.records.table')
        </div>
    </div>
@endsection
