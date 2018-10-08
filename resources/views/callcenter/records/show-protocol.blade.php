@extends('layouts.app')

@section('content')

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col-md-8 offset-md-2">
                            <div class="new-record">
                                <header>
                                    <img src="/templates/mv/svg/logo-alo-alerj-callcenter-bgwhite.svg" class="logo img-responsive" alt="AloAlerj - Callcenter">
                                    <div class="record">
                                        <small>Protocolo nº</small>
                                        <strong>{{ $record->protocol }}</strong>
                                    </div>
                                </header>
                                <section class="records-progress mt-5">
                                    <h4>
                                        <span class="label-group"><span class="label label-primary"><i class="fas fa-check"></i></span><span class="label label-primary ng-binding">O protocolo foi criado com sucesso</span></span>
                                    </h4>
                                </section>
                                <section class="personal-data mt-4">
                                    <div class="number">
                                        <small>anote o número do novo protocolo</small>
                                        <strong><a dusk="protocol-number" id="protocol-number" href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a>  <i class="far fa-copy"></i> </strong>
                                    </div>
                                </section>
                                <section class="personal-data">
                                    <div class="name">
                                        <small>criado para</small>
                                        <strong><a href="{{ route('people.show', ['id' => $record->person->id]) }}">
                                                {{ $record->person->name }}
                                            </a>
                                        </strong>
                                    </div>
                                </section>
                                <section class="strap">
                                    <div class="box">
                                        <div class="date01">
                                            <small>Protocolo criado em</small>
                                            <strong>8 outubro 2018 - 13h29</strong>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>




  {{--  <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <a href="{{ route('people.show', ['id' => $record->person->id]) }}">
                                {{ $record->person->name }}
                            </a>
                        </li>

                        <li>
                            Protocolo {{ $record->protocol }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body text-center">
            <div class="row">
                <div class="col mt-8">
                    <p>
                        O protocolo foi criado com sucesso
                    </p>
                    <h3 class="text-center">
                        Anote o número do novo Protocolo
                    </h3>
                </div>
            </div>

            <br/>

            <h2>
                --}}{{--<a dusk="protocol-number" id="protocol-number" href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a>--}}{{--
                <i class="far fa-copy"></i>
                <p>
                    @if($record && $record->id)
                        <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                            <i class="far fa-copy"></i> Copiar link público
                        </button>
                    @endif
                </p>
            </h2>

            <br/>

            <h3>
                <a href="{{ route('people.show', ['id' => $record->person->id]) }}">
                    {{ $record->person->name }}
                </a>
            </h3>

            <p>
                @if($record && $record->id)
                    <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                        <i class="far fa-copy"></i> Copiar link público
                    </button>
                @endif
            </p>


        </div>
    </div>--}}


@endsection
