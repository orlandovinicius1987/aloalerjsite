<!-- Footer -->
<section id="footer">
    <div class="container">

{{--

        <div class="row">
            <div class="col-12 col-sm-4 col-md-3 offset-md-1">
                <img src="/templates/2021/images/ALERJ_NOVO_horizontal-branco.png" class="img-fluid">
            </div>
            <div class="col-12 col-sm-4 col-md-7 text-white">
                --}}
{{--<p class="titulo">PALÁCIO TIRADENTES</p>--}}{{--

                <p>Rua Primeiro de março, s/n  |  Praça XV - Rio de Janeiro<br><span>CEP</span> 20010-090 &nbsp;&nbsp; <span>Telefone</span> +55 (21) 2588-1000 &nbsp;&nbsp; </p>
                <hr class="">
                <ul class="list-unstyled list-inline social">
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fab fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

--}}

        <div class="row">
            <div class="comissoes col-md-12 text-white mt-4">
{{--                <hr class="mb-3">--}}
                <h3 class="mb-4">Comissões </h3>
                <ul class="list-inline">
                    @foreach($committeeServices as $committeService)
                        <li><a href="{{ route('services.show', ['id'=>$committeService->id]) }}">{{$committeService->link_caption}}</a></li>
                    @endforeach
                </ul>
                <hr class="mt-4">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-12 col-sm-4 col-md-4 ">
                <img src="/templates/2021/images/ALERJ_NOVO_horizontal-branco.png" class="img-fluid">
            </div>
            <div class="col-12 col-sm-4 col-md-8 text-white">
                {{--<p class="titulo">PALÁCIO TIRADENTES</p>--}}

                <div class="row mt-4">
                    <div class="col-6">
                        <p>Rua Primeiro de março, s/n  |  Praça XV - Rio de Janeiro<br><span>CEP</span> 20010-090 &nbsp;&nbsp; <span>Telefone</span> +55 (21) 2588-1000 &nbsp;&nbsp; </p>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled list-inline social">

                            <li class="list-inline-item"><a href="https://www.facebook.com/assembleiaRJ" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li class="list-inline-item "><a href="https://twitter.com/alerj" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://instagram.com/instalerj/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.youtube.com/user/dcsalerj" target="_blank"><i class="fab fa-youtube"></i></a></li>

                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fab fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
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
        </div>


{{--
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12 text-center text-white">
                <p class="h6">© Todos os direitos reservados. |
                    <a class="ml-2" href="http://www.alerj.rj.gov.br/" target="_blank">
                        ALERJ - Assémbleia Legislativa do Estado do Rio de Janeiro
                    </a>
                </p>
            </div>
            <hr>
        </div>
--}}

    </div>
</section>
<!-- ./Footer -->
