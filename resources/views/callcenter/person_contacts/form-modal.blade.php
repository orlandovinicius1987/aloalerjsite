    <!-- Button trigger modal -->
    <a id="buttonContatos" href="#" data-toggle="modal" data-target="#contactsModal"
       class="btn btn-primary btn-sm pull-right">
        <i class="fa fa-plus"></i>
        Novo Contato
    </a>


    <!-- Modal -->
    <div class="modal fade" id="contactsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="vue-contact-outside-workflow" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Relacionar Assunto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form class="form" id="form_insertContact" name="form_insertContact" action="{{ route('persons.insertContact') }}" method="post">

                    <div class="modal-body">

                        {{ csrf_field() }}

                        <input name="person_id" type="hidden" value="{{ $person->id }}">

                        <div class="row">
                            <div class="col-md-5">
                                <p>Selecione o tipo de contato</p>
                                <select v-model="currentContactType" name="contact_type_id" class="select form-control" id="contact_type_id">
                                    <option value="" selected>SELECIONE</option>
                                    @foreach ($contactTypes as $key => $contactType)
                                        <option value="{{ $contactType->id }}">{{ $contactType->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-7">
                                <p>Contato</p>

                                <div v-if="mobileSelected">
                                        <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                               id="contact"
                                               name="contact"
                                               value="" required autofocus
                                               v-mask='["(##)####-####", "(##)#####-####"]'
                                                {{--v-model='form.mobile'--}}
                                        >

                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="whatsappSelected">
                                        <input class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                               v-mask='["(##)#####-####"]'
                                                {{--v-model='form.whatsapp'--}}
                                        >

                                        @if ($errors->has('whatsapp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('whatsapp') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="emailSelected">
                                        <input type=email class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                        >

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="phoneSelected">
                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                               v-mask="['(##) ####-####', '(##) #####-####']"
                                                {{--v-model='form.phone'--}}
                                        >

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="facebookSelected">
                                        <input type=facebook class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                        >

                                        @if ($errors->has('facebook'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="twitterSelected">
                                        <input type=twitter class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                        >

                                        @if ($errors->has('twitter'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('twitter') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div v-if="instagramSelected">
                                        <input type=instagram class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="contact"
                                               id="contact"
                                               value=""
                                               autofocus
                                        >

                                        @if ($errors->has('instagram'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('instagram') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id='buttonRelacionarLei' class="btn btn-primary">
                            <i class="fa fa-plus"></i> Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>