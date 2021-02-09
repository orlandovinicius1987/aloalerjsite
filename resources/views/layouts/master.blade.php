<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content-main')
            </div>
        </div>
    </div>
</section>
<!-- END Content -->

@include('partials.footer')

@include('partials.google-analytics')
</body>
</html>
