<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row mt-5">

            <div class="col-12 col-sm-4 col-md-3 ">
                <img src="/templates/2021/images/logotipo_inferior.png" height="100">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mt-2 mt-sm-5 text-white text-center">
                        <p class="titulo">PALÁCIO TIRADENTES</p>
                        <p>Rua Primeiro de março, s/n <br> Praça XV - Rio de Janeiro<br><span>CEP</span> 20010-090 &nbsp;&nbsp; <span>Telefone</span> +55 (21) 2588-1000 &nbsp;&nbsp; </p>


                    </div>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mt-2 mt-sm-4">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                </div>

            </div>

            <div class="col-12 col-sm-8 col-md-9">

                <div class="row">

                    <div class="col-md-12 text-white mb-4">
                        <h3>Comissões</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="comissoes col-md-12">
                        @foreach($committeeServices as $committeService)
                            <p><a href="{{ route('services.show', ['id'=>$committeService->id]) }}">{{$committeService->link_caption}}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p class="h6">© Todos os direitos reservados. |
                    <a class="ml-2" href="http://www.alerj.rj.gov.br/" target="_blank">
                        ALERJ - Assémbleia Legislativa do Estado do Rio de Janeiro
                    </a>
                </p>

            </div>
            <hr>
        </div>


    </div>
</section>
<!-- ./Footer -->
