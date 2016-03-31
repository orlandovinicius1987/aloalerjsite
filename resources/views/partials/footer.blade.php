<!-- Footer -->

<div class="visible-xs visible-sm col-xs-12 col-sm-12 text-center footer-mobile-box">
    <div class="footer-mobile">
        <div class="tit-comissoes"> Comissões </div>
        <div class="col-xs-12 col-sm-6 nomes-comissoes">
            @include('partials.commitees-links-1')
            @include('partials.commitees-links-2')
        </div>
        <div class="col-xs-2"></div>
        <div class="col-xs-8 col-sm-4 footer-logo-alerj">
            <img src="/templates/mv/svg/logo-alerj-rodape.svg" class="img-responsive" alt="Alerj">
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>

<div class="panel-group hidden-xs hidden-sm"   >
    <div class="panel panel-default">
        <div class="container">
            <div class="panel-heading btn-group dropup">
                <h4 class="panel-title corpo-comissoes">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Comissões <span class="caret"></span>
                    </a>
                </h4>
            </div>
        </div>
        {{--<!-- Single button -->--}}
        {{--<div class="btn-group dropup">--}}
            {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Comissões --}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="#">Action</a></li>--}}
                {{--<li><a href="#">Another action</a></li>--}}
                {{--<li><a href="#">Something else here</a></li>--}}
                {{--<li role="separator" class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        <div >
            <div class="panel-body ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 comissoes-footer">
                            @include('partials.commitees-links-1')
                        </div>
{{--
                        <div class="col-md-3 comissoes-footer">
                            @include('partials.commitees-links-2')
                        </div>
                        <div class="col-md-3 comissoes-footer">
                            @include('partials.commitees-links-3')
                        </div>
--}}

{{--                        <div class="col-md-1"></div>--}}
                        <div class="col-md-offset-4 col-md-3">
                            <img src="/templates/mv/svg/logo-alerj-rodape.svg" class="logo-alerj-rodape img-responsive" alt="Alerj">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer -->
