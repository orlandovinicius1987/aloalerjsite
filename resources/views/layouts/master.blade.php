<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alô Alerj</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="alerj, alo alerj, call center, callcenter, chat, cidadao, comissoes, whatsapp, telegram, operador, atendimento" />
    <meta name="description" content="Sistema de Atendimento via Chat do Alo Alerj e Comissoes" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/templates/2021/images/favicon.ico">

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script>
        window.laravel =@json($laravel) //laravel.old
    </script>


</head>

<body id="vue-app">
@include('partials.header')

@include('partials.main-alerts')

<!-- Content -->
<section>
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="col-12">
                @yield('content-main')
            </div>

{{--
            <div class="col-3 pt-5">
                <div class="list-group mt-5">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        O Alô Alerj
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Comissões</a>
                    <a href="#" class="list-group-item list-group-item-action">Telefones Úteis</a>
                    <a href="#" class="list-group-item list-group-item-action">Protocolo</a>
                    <a href="#" class="list-group-item list-group-item-action">Contato</a>
                </div>
            </div>
--}}

        </div>
    </div>
</section>
<!-- END Content -->

@include('partials.footer')

@include('partials.google-analytics')
</body>
</html>
