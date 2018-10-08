@extends('layouts.app')

@section('content')
    <div class="card mt-4">
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
                <a dusk="protocol-number" id="protocol-number" href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a>
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
    </div>
@endsection
