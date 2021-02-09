@extends('layouts.master')

@section('content-main')
    <div id="vue-phones">
        <div class="page-name">
            <h1 class="nome-pagina">Telefones Úteis</h1>
        </div>

        <div class="texto-pages telefones-uteis">


{{--


            <div class="row" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 719px;">
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 0px;">

                     <div class="card">
                         <div class="card-body">
                             <p class="label-contato"><strong>@{{ phone.label }}</strong></p>
                             <p class="info-contato">@{{ phone.name }}</p>
                             <span class="tel-contato" v-for="number in phone.phones">
                                 <span class="glyphicon glyphicon-earphone c-info"></span><strong>@{{ number }}</strong>
                                 <span> @{{ phone.obs }} </span>
                             </span>
                         </div>
                     </div>
                 </div>

                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 0px;">
                     <div class="card p-3">
                         <figure class="p-3 mb-0">
                             <blockquote class="blockquote">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                             </blockquote>
                             <figcaption class="blockquote-footer mb-0 text-muted">
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                             </figcaption>
                         </figure>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 0px;">
                     <div class="card">
                         <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

                         <div class="card-body">
                             <h5 class="card-title">Card title</h5>
                             <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                             <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 201px;">
                     <div class="card bg-primary text-white text-center p-3">
                         <figure class="mb-0">
                             <blockquote class="blockquote">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                             </blockquote>
                             <figcaption class="blockquote-footer mb-0 text-white">
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                             </figcaption>
                         </figure>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 340px;">
                     <div class="card text-center">
                         <div class="card-body">
                             <h5 class="card-title">Card title</h5>
                             <p class="card-text">This card has a regular title and short paragraph of text below it.</p>
                             <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 362px;">
                     <div class="card">
                         <svg class="bd-placeholder-img card-img" width="100%" height="260" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Card image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Card image</text></svg>

                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 378px;">
                     <div class="card p-3 text-end">
                         <figure class="mb-0">
                             <blockquote class="blockquote">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                             </blockquote>
                             <figcaption class="blockquote-footer mb-0 text-muted">
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                             </figcaption>
                         </figure>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 517px;">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Card title</h5>
                             <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                             <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                         </div>
                     </div>
                 </div>
             </div>


--}}





            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8">

                    <div class="input-group c-search">
                        <input v-model="filter" class="form-control" id="contact-list-search">
                        <span class="input-group-btn">
							                <button class="btn btn-default" type="button">
                                                <span class="glyphicon glyphicon-search text-muted"></span>
                                            </button>
                                        </span>
                    </div>
                </div>
            </div>


            <div class="row" data-masonry='{"percentPosition": true }' id="contact-list">


                <div class="col-sm-12 col-lg-4 mb-4"  v-for="phone in filteredPhones">
                    <div class="card">
                        <div class="card-body">
                            <p class="label-contato"><strong>@{{ phone.label }}</strong></p>
                            <p class="info-contato">@{{ phone.name }}</p>
                            <span class="tel-contato" v-for="number in phone.phones">
                                 <span class="glyphicon glyphicon-earphone c-info"></span><strong>@{{ number }}</strong>
                                 <span> @{{ phone.obs }} </span>
                             </span>
                        </div>
                    </div>
                </div>
{{--
                    <ul class="list-group" id="contact-list">
                        <li class="list-group-item" v-for="phone in filteredPhones">

                            <div class="contato col-xs-12" id="letra-a">
                                <p class="label-contato"><strong>@{{ phone.label }}</strong></p>
                                <p class="info-contato">@{{ phone.name }}</p>
                                <span class="tel-contato" v-for="number in phone.phones">
                                                    <span class="glyphicon glyphicon-earphone c-info"></span><strong>@{{ number }}</strong>
                                                    <span> @{{ phone.obs }} </span>
                                                </span>
                            </div>


                            <div class="clearfix"></div>
                        </li>
                    </ul>
                --}}

                </div>
            </div>
        </div>

    </div>
@stop
