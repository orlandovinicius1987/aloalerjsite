@extends('layouts.app')

@section('content')

<div class="card-header">{{ __('Persons') }}</div>

<div class="card-body">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    @if(session()->has('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning') }}
    </div>
    @endif

    <div class="col-xs-8 col-md-10">
        <h4>
            <a href="{{ route('persons.create') }}">Novo</a>
        </h4>
    </div>

    <div class="col-xs-8 pull-right">
        <div class="input-group">
            <form action="{{ route('persons.index') }}" id="searchForm">
                <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar"
                       value="{{ $pesquisa or '' }}">
                <div class="input-group-addon" id="searchButton"
                     onClick="javascript:document.getElementById('searchForm').submit();">Pesquisar<i
                            class="fa fa-search"></i></div>
            </form>
        </div>
    </div>

</div>

@endsection
