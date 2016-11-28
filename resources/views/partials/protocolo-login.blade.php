<div class="hidden-xs hidden-sm boxshadow">
    <div class="protocolo-bloco text-center">
        {{--<i class="fa fa-ticket icone" aria-hidden="true"> </i>--}}
        <h4>Acompanhamento <br>de Protocolo </h4>
   {{--     <div class="container">
            <div class="row">
                <div class="">
                    <div class="">
                        <div>
                            <form class="form-horizontal" method="post" action="#">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Número de Protocolo" name="protocolo" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nome" name="" type="text">
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Consultar">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <form class="form-horizontal" method="post" action="#">

            <div class="form-group">
                {{--<label for="name" class="cols-sm-2 control-label">Seu Nome</label>--}}
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Nome"/>
                    </div>
                </div>
            </div>


            <div class="form-group">
                {{--<label for="username" class="cols-sm-2 control-label">Número de Protocolo</label>--}}
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-ticket fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" id="username"  placeholder="Número de protocolo"/>
                    </div>
                </div>
            </div>


            <div class="form-group ">
                <button type="button" class="btn btn-primary btn-lg btn-block login-button">Consultar</button>
            </div>

        </form>
    </div>
</div>



<div class="visible-xs visible-sm">


</div>
