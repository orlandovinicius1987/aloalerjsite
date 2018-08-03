@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Persons') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if(session()->has('warning'))
                        <div class="alert alert-warning">
                            {{ session()->get('warning') }}
                        </div>
                        @endif

                        <div class="col-xs-8 col-md-10">
                            <h4>
                                <a href="{{ route('origins.create') }}">Novo</a>
                            </h4>
                        </div>

                        <table id="originsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nome</th>
                            </tr>
                            </thead>

                            @forelse ($origins as $origin)
                                <tr>
                                    <td>
                                        <a href="{{ route('origins.show', ['id' => $origin->id]) }}">{{ $origin->name }}</a>
                                    </td>
                                </tr>
                            @empty
                                <p>Nenhuma Via encontrada.</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
