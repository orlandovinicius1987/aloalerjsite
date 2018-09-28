@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            Protocolo {{ $record->protocol }}
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <h5 class="text-right">
                        @if ($record->resolved_at)
                            <span class="badge badge-danger">PROTOCOLO FINALIZADO</span>
                        @else
                            <span class="badge badge-success">PROTOCOLO EM ANDAMENTO</span>
                        @endif
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label text-md-right">Nome Completo</label>
                <div class="col-md-6">
                    {{ $record->person->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="committee_id" class="col-sm-4 col-form-label text-md-right">Origem</label>

                <div class="col-md-6">
                    {{ $record->origin->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="committee_id" class="col-sm-4 col-form-label text-md-right">Comissão</label>

                <div class="col-md-6">
                    {{ $record->committee->name  ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="record_type_id" class="col-sm-4 col-form-label text-md-right">Tipo</label>

                <div class="col-md-6">
                    {{ $record->recordType->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="area_id" class="col-sm-4 col-form-label text-md-right">Área</label>

                <div class="col-md-6">
                    {{ $record->area->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="identification" class="col-sm-4 col-form-label text-md-right">
                    Criado em
                </label>

                <div class="col-md-4">
                    {{ $record->created_at_formatted ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="identification" class="col-sm-4 col-form-label text-md-right">
                    Alterado em
                </label>

                <div class="col-md-4">
                    {{ $record->updated_at_formatted ?? '' }}
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-4">
                    <h3>
                        Andamentos
                    </h3>
                </div>
            </div>
        </div>

        @include('callcenter.progress.partials.table', ['progresses' => $record->progresses])
    </div>
@endsection
