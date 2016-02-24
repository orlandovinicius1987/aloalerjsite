@extends('layouts.master')

@section('page-name')
    <div class="conteiner-logo">
        @include('partials.logo-alerj-comissoes')

        <h1 class="nome-cmissao">COMISSÃO DE DEFESA <br/>DE MEIO AMBIENTE</h1>
    </div>
@stop

@section('sidebar-name')
    <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc">
@stop

@section('contents')
    @include('partials.header')

    @include('partials.committee-telephone', [
        'title' => 'DISQUE DENÚNCIA MEIO AMBIENTE',
        'telephone' => '0800 282 7060',
        'site' => '',
    ])

    <!--Conteudo-->
    <div class="conteiner-conteudo">
        <img src="http://www.disquedenuncia.org.br/uploaded/5_6_2012__0_Cartaz%20A3%20Interior.jpg" class="imagem-comissao">
        <div class="texto-comissao-ma">
            <p>A Comissão de Defesa de Meio Ambiente cuida da proteção dos recursos naturais e zela pelo desenvolvimento sustentável do Estado. É um meio não só de prevenção, mas também de alerta para os maus-tratos à natureza. O registro das reclamações de temas relacionados à defesa do meio ambiente podem ser feitos anonimamente para garantir a segurança do denunciante. A comissão se manifesta aos assuntos referentes:</p>
            <ul id="ul-ma">
                <li>À política e sistema regionais do meio ambiente</li>
                <li>À legislação de defesa ecológica</li>
                <li>Aos recursos naturais renováveis</li>
                <li>À fauna, flora e ao solo</li>
                <li>Aos processos de edafologia e desertificação</li>
                <li>Ao incentivo ao reflorestamento</li>
                <li>À preservação e proteção das culturas populares e étnicas do Estado</li>
            </ul>
        </div>
    </div>

    @include('partials.footer')

    @include('partials.scripts')
@stop
