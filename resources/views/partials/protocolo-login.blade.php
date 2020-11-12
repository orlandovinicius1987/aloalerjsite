<div  class="hidden-xs hidden-md boxshadow">
    <div class="protocolo-bloco text-center">
        {{--<i class="fa fa-ticket icone" aria-hidden="true"> </i>--}}
        <h3>Acompanhamento <br>de Protocolo </h3>
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
        <hr>
        <form class="form-horizontal" method="post" action="{{ route('records.search-show-public') }}">
            @csrf
          
            <div class="form-group">
                {{--<label for="username" class="cols-sm-2 control-label">Número de Protocolo</label>--}}
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-ticket fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="protocol" id="protocol"  placeholder="Número de protocolo" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="access_code" id="access_code"  placeholder="Código de acesso">
                    </div>
                </div>
            </div>


            @if ($errors->first())
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif


            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block protocolo-button">Consultar</button>
            </div>
            
           
           

        </form>
    </div>
</div>



<div class="visible-xs visible-sm">


</div>
