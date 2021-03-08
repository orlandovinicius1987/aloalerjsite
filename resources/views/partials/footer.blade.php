<!-- Footer -->
<section id="footer">
    <div class="container text-center text-lg-start">

        <div class="row">
            <div class="comissoes col-md-12 text-white mt-4">
                <h3 class="mb-4">Comissões </h3>
                <ul class="list-inline">
                    @foreach($committeeServices as $committeService)
                        <li><a href="{{ route('services.show', ['id'=>$committeService->id]) }}">{{$committeService->link_caption}}</a></li>
                    @endforeach
                </ul>
                <hr class="mt-4">
            </div>
        </div>


        <div class="row d-flex align-items-center bd-highlight mb-3 text-white">
            <div class="col-12 col-sm-4 col-md-4 ">
                <a href="//www.alerj.rj.gov.br/" target="_blank">
                    <img src="/templates/2021/images/ALERJ_NOVO_horizontal-branco.png" class="img-fluid">
                </a>
            </div>
            <div class="col-12 col-sm-4 col-md-8 text-white ">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <p>Rua Primeiro de março, s/n<br>
                            Praça XV - Rio de Janeiro<br>
                            <span>CEP</span> 20010-090 &nbsp;&nbsp; <span class="telefone">+55 (21) 2588-1000</span>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="social row">
                            <div class="col-2"><a href="https://www.facebook.com/assembleiaRJ" target="_blank"><i class="fab fa-facebook"></i></a></div>
                            <div class="col-2"><a href="https://twitter.com/alerj" target="_blank"><i class="fab fa-twitter"></i></a></div>
                            <div class="col-2"><a href="https://instagram.com/instalerj/" target="_blank"><i class="fab fa-instagram"></i></a></div>
                            <div class="col-2"><a href="https://www.youtube.com/user/dcsalerj" target="_blank"><i class="fab fa-youtube"></i></a></div>
                            <div class="col-2"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="far fa-envelope"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





{{--
        <div class="row mt-2">
            <div class="col-12 col-sm-4 col-md-4 ">
                <a href="//www.alerj.rj.gov.br/" target="_blank">
                    <img src="/templates/2021/images/ALERJ_NOVO_horizontal-branco.png" class="img-fluid">
                </a>
            </div>

            <div class="col-12 col-sm-4 col-md-8 text-white ">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <p>Rua Primeiro de março, s/n  |  Praça XV - Rio de Janeiro<br><span>CEP</span> 20010-090 &nbsp;&nbsp; <span>Telefone</span> +55 (21) 2588-1000 &nbsp;&nbsp; </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="social row">
                            <div class="col-2"><a href="https://www.facebook.com/assembleiaRJ" target="_blank"><i class="fab fa-facebook"></i></a></div>
                            <div class="col-2"><a href="https://twitter.com/alerj" target="_blank"><i class="fab fa-twitter"></i></a></div>
                            <div class="col-2"><a href="https://instagram.com/instalerj/" target="_blank"><i class="fab fa-instagram"></i></a></div>
                            <div class="col-2"><a href="https://www.youtube.com/user/dcsalerj" target="_blank"><i class="fab fa-youtube"></i></a></div>
                            <div class="col-2"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="far fa-envelope"></i></a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
--}}


        <div class="row text-center text-white">
            <div class="col-12">
                <hr class="mb-4">
                <p class="h6">© Todos os direitos reservados. |
                    <a class="ml-2" href="http://www.alerj.rj.gov.br/" target="_blank">
                        ALERJ - Assémbleia Legislativa do Estado do Rio de Janeiro
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ./Footer -->
