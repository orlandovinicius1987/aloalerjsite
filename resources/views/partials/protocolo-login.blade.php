<div  class="boxshadow">


    <div class="protocolo-bloco text-center">

        <h3 class="mt-4 mb-5">
            Acompanhamento de Protocolo
        </h3>

        <form class="form-horizontal mb-4" method="post" action="{{ route('records.search-show-public') }}">
            @csrf
            <div class="form-group mb-3">
                {{--<label for="username" class="cols-sm-2 control-label">Número de Protocolo</label>--}}
                <div class="col-sm-10 offset-sm-1">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <input type="text" class="form-control" name="protocol" id="protocol"  placeholder="Número de protocolo" required/>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="col-sm-10 offset-sm-1">

                    <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fas fa-key"></i>
                        </span>
                        <input type="password" class="form-control" name="access_code" id="access_code"  placeholder="Código de acesso">
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary btn-lg btn-block protocolo-button">Consultar</button>
            </div>
        </form>
    </div>


</div>
