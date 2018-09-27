@extends('layouts.app')

@section('heading')
        <div class="mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group text-center">
                        <form method="post" action="{{ route('records.search') }}" aria-label="Protocolos" id="formRecords">
                            @csrf
                            <h2 class="section-title">
                                <i class="fas fa-search"></i> Pesquisar Protocolos
                            </h2>

                            <div class="form-bigger">
                                <div class="form-group row search">
                                    <div class="col-12">
                                        <input id="protocol" name="protocol" value="{{ $protocol ?? '' }}" class="form-control" placeholder="Protocolo" required/>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="searchButton" type="submit" class="btn btn-danger">
                                    Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    @if (isset($record) and !is_null($record))
        @include('callcenter.records.show-public', ['record' => $record])
    @elseif (isset($protocol) && !is_null($protocol))
        Protocolo {{$protocol}} não foi encontrado.
    @endif
@endsection
