@extends('layouts.app')

@section('heading')
    @parent



    <div class="mt-4" id="vue-personal-info">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 form-bigger">
                <div class="text-center">
                    <div class="section-title"><i class="fas fa-user-times"></i> Divergência / <i class="far fa-address-card"></i> Dados Pessoais </div>
                    <h5>Já Existe uma pessoa com o CPF/CNPJ {{$record->person->cpf_cnpj}} Cadastrado</h5>
                    <br />
                    <h5>O que Deseja Fazer?</h5>
                    <form method="POST" action="{{ route('people.store-diverge') }}" >
                        @csrf
                        <input type="hidden" name="person_id" value="{{$record->person->id}}" />
                        <input type="hidden" name="record_id" value="{{$record->id}}" />
                        <div class="row text-left">
                            <div class="col-md-3">
                                <label for="public" class="col-form-label">Manter nome atual:</label>
                            </div>
                            <div class="col=md-9">
                                <input type="radio" name="name" value="{{$record->person->name}}" >
                                {{$record->person->name}}
                            </div>
                        </div>

                        <div class="row text-left">
                            <div class="col-md-3">
                                <label for="public" class="col-form-label">Atualizar nome:</label>
                            </div>
                            <div class="col=md-9">
                                <input type="radio" name="name" value="{{$newName}}" >
                                {{$newName}}
                            </div>
                        </div>



                        <div class="form-group text-center row">
                            <div class="col-12 text-center">
                                <button id="saveButton" type="submit" class="btn btn-danger">
                                    @if ($workflow)
                                        Próximo passo  <i class="fas fa-forward"></i>
                                    @else
                                        <i class="far fa-save"></i> Atualizar
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if (isset($records))
        @include('callcenter.records.partials.table')
    @endif

    @if (isset($addresses))
        @include('callcenter.person_addresses.index')
    @endif

    @if (isset($contacts))
        @include('callcenter.person_contacts.index')
    @endif
@stop
