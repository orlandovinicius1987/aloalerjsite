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
                <div class="col bg-success mt-8">
                    <h1 class="text-center">
                        Anote o número do novo Protocolo
                    </h1>
                </div>
            </div>

            <br/>

            <h1>
                <a dusk="protocol-number" id="protocol-number" href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a>
                <p>
                    @if($record && $record->id)
                        <button id="saveButton" type="submit" class="btn btn-primary" @click.prevent="copyUrl('{{ route('records.show-public', $record->protocol) }}')" :disabled="isEditing || isCreating">
                            <i class="far fa-copy"></i> Copiar link público
                        </button>
                    @endif
                </p>
            </h1>

            <br/>

            <h3>
                <a href="{{ route('people.show', ['id' => $record->person->id]) }}">
                    {{ $record->person->name }}
                </a>
            </h3>
        </div>
    </div>
@endsection
