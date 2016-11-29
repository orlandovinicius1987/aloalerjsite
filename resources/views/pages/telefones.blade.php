@extends('layouts.master')



@section('content-main')
    <div class="page-name">
        <h1 class="nome-pagina">Telefones Úteis</h1>
    </div>
    <div class="texto-pages telefones-uteis">




        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                    <div class="panel panel-default">



                       {{-- <div class="panel-heading c-list">
                            <span class="title">Telefones Úteis</span>
                            <ul class="pull-right c-controls">
                                <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>--}}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group c-search">
                                    <input type="text" class="form-control" id="contact-list-search">
							<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
							</span>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group" id="contact-list">
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-a">
                                    <p class="label-contato"><strong>ABAM</strong></p>
                                    <p class="info-contato">Associação Brasileira de Auxílio Mútuo ao Servidor Público</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2232-4580</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Aerobarcas</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2533-4343</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Aeroporto Internacional</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2432-7070</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Aeroporto de Jacarepaguá</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2620-8589</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Aeroporto Santos Dumont</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3398-5050</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>AFDM - BRASIL</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3398-4526</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Agência Nacional de Saúde</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3398-4527</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Água e esgoto</strong></p>
                                    <p class="info-contato">Cedae (Companhia Estadual de Águas e Esgotos)</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-2821-195</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Al-Anon</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2507-4558</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Alcoólicos Anônimos</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2507-5830</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Alô Rio</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2542-8080</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2542-8004</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Ambulância</strong></p>
                                    <p class="info-contato">Serviço Público de Remoção de Doentes - SAMU</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>192</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Ampla</strong></p>
                                    <p class="info-contato">Iluminação e energia</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-2821-195</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>ANATEL</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-282-1195</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Animais</strong></p>
                                    <p class="info-contato">Suipa (Sociedade União Internacional Protetora dos Animais)</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2501-1529</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2501-9954</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2261-6875</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2501-8691</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2261-9405</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2501-1085</strong></span>
                                    <span class="linha-contato"></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Anjos do Asfalto</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2590-2121</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>ASEP</strong></p>
                                    <p class="info-contato">Agência Reguladora de Serviços Públicos do Rio de Janeiro</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2253-4813</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Atendimento ao Turista</strong></p>
                                    <p class="info-contato">Centro Integrado de Atendimento ao Turista</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2541-7522</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2542-8004</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2542-8080</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>APAE</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2220-5065</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-b">
                                    <p class="label-contato"><strong>Banco Central</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2253-9283</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Banco de Sangue</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-280-0120</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>BPTur</strong></p>
                                    <p class="info-contato">Batalhão de Policiamento em Áreas Turísticas</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2332-7932</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Barcas</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>133</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-c">
                                    <p class="label-contato"><strong>Caixa Econômica Federal</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3978-8827</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>CAS</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3978-8829</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Cedae</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-24-9040</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>CEG</strong></p>
                                    <p class="info-contato">Gás</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-24-7766</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-282-0205</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-979-2345</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Central de Atendimento à Mulher</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>180</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Central de Atendimento ao Cidadão</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>1746</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>CET-Rio</strong></p>
                                    <p class="info-contato">Trânsito</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2226-5566</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-282-0708</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Comlurb</strong></p>
                                    <p class="info-contato">Companhia Municipal de Limpeza Urbana</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2204-9999</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2214-7073</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Corpo de Bombeiros</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>193</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Correios</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-570-0100</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Crianças desaparecidas</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2286-8337</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2226-6375</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2286-7631</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>CVV</strong></p>
                                    <p class="info-contato">Centro de Valorização da Vida</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-726-0101</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Defesa Civil</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>199</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-d">
                                    <p class="label-contato"><strong>Defesa Civil Estadual</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3399-4302</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3399-4301</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2293-1713</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Defesa Civil Municipal</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>199</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Delegacia de Atendimento ao Turista</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-282-1195</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Delegacia da Mulher</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>142</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Detran</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-20-4040</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-24-7766</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Direitos Humanos</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2508-5500</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque-Aids</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-570-0100</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque-Amamentação</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>141</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Barulho</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2503-2795</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Denúncia</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2253-1177</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Intoxicação</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800 722 6001</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Procon</strong></p>
                                    <p class="info-contato">Defesa do consumidor</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>1512</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Sinal</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2508-5500</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Transportes</strong></p>
                                    <p class="info-contato">Trânsito</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2286-8010</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Disque Verde</strong></p>
                                    <p class="info-contato">Patrulha ambiental</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2498-1001</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-g">
                                    <p class="label-contato"><strong>GAT</strong></p>
                                    <p class="info-contato">Grupamento de Apoio ao Turista</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2535-3780</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2535-2385</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-h">
                                    <p class="label-contato"><strong>Disque Sangue
                                            HEMORIO</strong>
                                    </p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800 2820708</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-i">
                                    <p class="label-contato"><strong>INCA</strong></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3207-1000</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Instituto Benjamin Constant</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3478-4442</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-l">
                                    <p class="label-contato"><strong>Light</strong></p>
                                    <p class="info-contato">Iluminação e energia</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800-282-0120</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-m">
                                    <p class="label-contato"><strong>Moradores de rua</strong></p>
                                    <p class="info-contato">Secretaria de Estado de Assistência Social e Direitos Humanos</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2299-5451</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2299-5697</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-n">
                                    <p class="label-contato"><strong>Nar-Anon</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2263-6595</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Narcóticos Anônimos</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2533-5015</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-p">
                                    <p class="label-contato"><strong>Polícia Civil</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>197</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Polícia Federal</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>194</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Polícia Militar</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>190</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Poda ou remoção de árvores</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2221-2574</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Praças abandonadas</strong></p>
                                    <p class="info-contato">Fundação Parques e Jardins</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2323-3500</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-r">
                                    <p class="label-contato"><strong>RioLuz</strong></p>
                                    <p class="info-contato">Iluminação e energia</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3907-5600</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2535-5151</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Rodoviária Novo Rio</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2263-4857</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3213-1800</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>R 397</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-s">
                                    <p class="label-contato"><strong>Secretaria Municipal de Assistência Social</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>3973-3800</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-t">
                                    <p class="label-contato"><strong>Tapa buraco</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2589-1234</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>Telefonia</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>10331</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12">
                                    <p class="label-contato"><strong>TURISRIO</strong></p>
                                    <p class="info-contato">Companhia de Turismo do Estado do Rio de Janeiro</p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>0800 282 2007</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2333-1037</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="contato col-xs-12" id="letra-v">
                                    <p class="label-contato"><strong>Vigilância sanitária</strong></p>
                                    <p class="info-contato"></p>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2503-2280</strong></span>
                                    <span class="tel-contato"><span class="glyphicon glyphicon-earphone c-info" ></span><strong>2215-0690</strong></span>
                                    <div class="linha-contato"></div>
                                </div>
                                <div class="clearfix"></div>
                            </li>

{{--                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3">
                                    <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="name">Scott Stevens</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                                    <span class="visible-xs"> <span class="text-muted">5842 Hillcrest Rd</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                                    <span class="visible-xs"> <span class="text-muted">(870) 288-4149</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">scott.stevens@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>--}}

                        </ul>
                    </div>
                </div>
            </div>
            <!-- JavaScrip Search Plugin -->
            <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
        </div>






    </div>

@stop
