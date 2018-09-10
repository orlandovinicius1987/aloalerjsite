@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <ul class="aloalerj-breadcrumbs">
                        <li>
                            <a href="{{ route('people.show', ['id' => $person->id]) }}">
                                {{ $person->name }}
                            </a>
                        </li>

                        <li>
                            Protocolo {{ $record->protocol }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body">

            <h1 class="badge badge-success">
                Protocolo criado com sucesso:
            </h1>

            <br/>

            <h1>
                <a href="{{ route('records.show',['id' => $record->id]) }}" >{{ $record->protocol }}</a></td>
            </h1>

            <br/>

            <h3>
                <a href="{{ route('people.show', ['id' => $person->id]) }}">
                    {{ $person->name }}
                </a>
            </h3>

        </div>

    </div>

@endsection
