@extends('layouts.app')

@section('content-login')
    <style>
        html, body {
            height: 100%;
        }
    </style>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col mx-auto">
                <div class="container">
                    <div class="row justify-content-center login">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">

                                    <div class="card-title">
                                        <img src="/templates/mv/svg/logo-alo-alerj-callcenter.svg" class="alolerj-logo-login img-responsive" alt="AloAlerj - Callcenter">
{{--                                        <h3> <i class="fas fa-sign-in-alt"></i> Entrar</h3>--}}
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="email" class="col-form-label">Login Alerj</label>
                                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="password" class="col-form-label">Senha</label>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Senha"  required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input
                                                        type="checkbox"
                                                        name="remember"
                                                        id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}
                                                        data-togglex="toggle"
                                                        data-on="Sim"
                                                        data-off="Não"
                                                    >

                                                    <label class="form-check-label" for="remember">
                                                        Lembrar de mim
                                                    </label>

                                                    {{--<button type="button" class="btn btn-xs btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off"  {{ old('remember') ? 'checked' : '' }}>--}}
                                                        {{--<div class="handle"></div>--}}
                                                    {{--</button>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 text-center">
                                                <button id="loginButton" type="submit" class="btn btn-primary btn-block">
                                                    Entrar
                                                </button>

{{--
                                                <a class="" href="{{ route('password.request') }}">
                                                Esqueceu a senha?
                                                </a>
--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
