@extends('layouts.app')


@section('heading')
    @parent


    <div class="mt-4">
        <div class="row text-center">
            <div class="col-md-8 offset-md-2">
                <div class="records">
                    <header>
                        <img src="/templates/mv/svg/logo-alo-alerj-callcenter-bgwhite.svg" class="logo img-responsive" alt="AloAlerj - Callcenter">

                        <div class="record">
                            <small>Protocolo nº</small>
                            <strong>{{ $record->protocol }}</strong>

                        </div>
                    </header>

                    <section class="records-progress mt-3">
                        <h5>
                            @if ($record->resolved_at)
                                <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">PROTOCOLO FINALIZADO</span>
                            @else
                                 <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">PROTOCOLO EM ANDAMENTO</span>
                            @endif
                        </h5>
                    </section>

                    <section class="personal-data">
                        <div class="name">
                            <small>Nome Completo</small>
                            <strong>{{ $record->person->name ?? '' }}</strong>
                        </div>
                    </section>

                    <section class="infos text-left">
                        <div class="record-data01">
                            <div class="box">
                                <small>Origem</small>
                                <strong>{{ $record->origin->name ?? '' }}</strong>
                            </div>
                            <div class="box">
                                <small>Departamento</small>
                                <strong>{{ $record->committee->name  ?? '' }}</strong>
                            </div>
                        </div>
                        <div class="record-data02">
                            <div class="box">
                                <small>Tipo</small>
                                <strong> {{ $record->recordType->name ?? '' }}</strong>
                            </div>
                            <div class="box">
                                <small>Assunto</small>
                                <strong>{{ $record->area->name ?? '' }}</strong>
                            </div>
                        </div>
                    </section>

                    <section class="strap">
                        <div class="box text-left">
                            <div class="date01">
                                <small>Criado em</small>
                                <strong>{{ $record->created_at_formatted ?? '' }}</strong>
                            </div>
                            <div class="date02">
                                <small>Alterado em</small>
                                <strong>{{ $record->updated_at_formatted ?? '' }}</strong>
                            </div>
                        </div>
                        <svg class="qrcode">
                            <use xlink:href="#qrcode"></use>
                        </svg>
                    </section>
                </div>

                @include('callcenter.records.qrcode')

            </div>
        </div>
    </div>




@endsection

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-4">
                    <h3>
                        <i class="fas fa-tasks"></i> Andamentos
                    </h3>
                </div>
            </div>
        </div>
        @include('callcenter.progress.partials.table', ['progresses' => $record->progresses])
    </div>

@endsection
