@extends('layouts.master')

@section('page-name')
    <h1 class="nome-comissao">Comissão de Defesa<br/>de Meio Ambiente</h1>
@stop

@section('sidebar-name')
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj.svg" class="logo-com-tel-dc visible-lg"></a>
    <a href="/"> <img src="/templates/mv/svg/logo-alo-alerj-branca.svg" class="logo-com-tel-dc visible-sm"></a>
@stop

@section('content-main')

    <img src="http://www.disquedenuncia.org.br/uploaded/5_6_2012__0_Cartaz%20A3%20Interior.jpg" class="img-responsive img-comissoes">
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
@stop

@section('content-sidebar')
    @include('partials.committee-telephone', [
         'title' => 'DISQUE MEIO AMBIENTE',
         'telephone' => '0800 023 0007',
         'site' => '<a href="http://www.alerj.rj.gov.br/cdc/" target="_blank"> <div class="link-site"><strong>http://www.alerj.rj.gov.br/cdc/</strong></div> </a>',
     ])
@stop

