@extends('layouts.app')


@section('heading')
    @parent

    <div class="mt-4">
        <div class="row text-center">
            <div class="col-md-8 offset-md-2">


                <div class="boardingPass">
                    <header class="boardingPass-header">
                        <h1 class="boardingPass-airline">Airline</h1>
                    </header>

                    <main class="boardingPass-main">
                        <div class="row">
                            <section class="boardingPass-departur col-xs">
                                <span class="section-label">London, UK</span>
                                <span class="boardingPass-departur-IATA">LDN</span>
                            </section>

                            <section class="boardingPass-transport boardingPass-icon col-xs">
                                <i class="boardingPass-transport-icon material-icons">airplanemode_active</i>
                            </section>

                            <section class="boardingPass-arrival col-xs">
                                <span class="section-label">Marseille, FR</span>
                                <span class="boardingPass-arrival-IATA">MRS</span>
                            </section>
                        </div>

                        <hr class="hr--invisible" />

                        <div class="row">
                            <section class="boardingPass-icon col-xs">
                                <i class="material-icons">event</i>
                            </section>

                            <section class="boardingPass-date col-xs">
                                <span class="section-label">Date</span>
                                <span>4 Nov</span>
                            </section>

                            <section class="boardingPass-departurTime col-xs">
                                <span class="section-label">Departur</span>
                                <span>10:00</span>
                            </section>

                            <section class="boardingPass-arrivalTime col-xs">
                                <span class="section-label">Arrival</span>
                                <span>12:05</span>
                            </section>
                        </div>

                        <hr />

                        <div class="row">
                            <section class="boardingPass-icon col-xs">
                                <i class="material-icons">flight_takeoff</i>
                            </section>

                            <section class="boardingPass-flight col-xs">
                                <span class="section-label">Flight</span>
                                <span>EZY147</span>
                            </section>

                            <section class="boardingPass-terminal col-xs">
                                <span class="section-label">Terminal</span>
                                <span>North</span>
                            </section>

                            <section class="boardingPass-gate col-xs">
                                <span class="section-label">Gate</span>
                                <span>58</span>
                            </section>
                        </div>

                        <hr />

                        <div class="row">
                            <section class="boardingPass-icon col-xs">
                                <i class="material-icons">account_circle</i>
                            </section>

                            <section class="boardingPass-passenger col-xs">
                                <span class="section-label">Passenger</span>
                                <span>Johan MOUCHET</span>
                            </section>

                            <section class="boardingPass-seat col-xs">
                                <span class="section-label">Seat</span>
                                <span>17A</span>
                            </section>

                            <section class="boardingPass-class col-xs">
                                <span class="section-label">Class</span>
                                <span>E</span>
                            </section>
                        </div>
                    </main>

                    <footer class="boardingPass-footer">
                        <div class="row">
                            <div class="boardingPass-qrCode col-xs"></div>
                        </div>
                    </footer>
                </div>


                <div class="section-title">
                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            Protocolo {{ $record->protocol }}
                        </li>
                    </ul>
                </div>

                <div class="col-md-8 offset-md-2">
                    <h4>
                        @if ($record->resolved_at)
                            <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">PROTOCOLO FINALIZADO</span>
                                @else
                                    <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">PROTOCOLO EM ANDAMENTO</span>
                        @endif
                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2 form-bigger">

                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="name" class="col-form-label">Nome Completo</label>
                        {{--<div class="form-control">{{ $record->person->name ?? '' }}</div>--}}

                        <input value="{{ $record->person->name ?? '' }}" readonly="readonly" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="committee_id" class="col-form-label">Origem</label>
                        {{ $record->origin->name ?? '' }}
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="committee_id" class="col-form-label">Comissão</label>
                        {{ $record->committee->name  ?? '' }}
                    </div>

                    <div class="col-md-6">
                        <label for="record_type_id" class="col-form-label">Tipo</label>
                        {{ $record->recordType->name ?? '' }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="area_id" class="col-form-label">Área</label>
                        {{ $record->area->name ?? '' }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="identification" class="col-form-label">
                        Criado em
                    </label>

                    <div class="col-md-4">
                        {{ $record->created_at_formatted ?? '' }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="identification" class="col-form-label">
                        Alterado em
                    </label>

                    <div class="col-md-4">
                        {{ $record->updated_at_formatted ?? '' }}
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
