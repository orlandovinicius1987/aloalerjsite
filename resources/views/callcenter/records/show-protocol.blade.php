@extends('layouts.app')

@section('content')
<div class="mt-4" id="vue-record">
    <div class="row text-center">
        <div class="col-md-8 offset-md-2">
            <div class="new-record">
                <header>
                    <img src="/templates/mv/svg/logo-alo-alerj-callcenter-bgwhite.svg" class="logo img-responsive"
                        alt="AloAlerj - Callcenter">
                    <div class="record">
                        <small>Protocolo nº</small>
                        <strong>{{ $record->protocol }}</strong>
                    </div>
                </header>
                <section class="records-progress mt-4">
                    <h4>
                        <span class="label-group"><span class="label label-primary"><i
                                    class="fas fa-check"></i></span><span class="label label-primary ng-binding">O
                                protocolo foi criado com sucesso</span></span>
                    </h4>
                </section>
                <div class="personal-data">
                    <div class="number">
                        <small>anote o número do novo protocolo</small>
                        <strong><a dusk="protocol-number" id="protocol-number"
                                href="{{ route('records.show',['id' => $record->id]) }}">{{ $record->protocol }}</a> <i
                                class="far fa-copy"></i> </strong>
                    </div>
                </div>
                <div class="personal-data ">
                    <div class="number">
                        <small>Código de acesso</small>
                        <strong>{{ $record->access_code }}</strong>
                    </div>
                </div>
                <div class="personal-data">
                    <div class="name">
                        <small>criado para</small>
                        <strong><a href="{{ route('people.show', ['person_id' => $record->person->id]) }}">
                                {{ $record->person->name }}
                            </a>
                        </strong>
                    </div>
                </div>
                <section class="strap">
                    <div class="box">
                        <div class="date01">
                            <small>Protocolo criado em</small>
                            <strong>{{ $record->created_at->format('d/m/Y H:i:s') }}
                            </strong>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection
