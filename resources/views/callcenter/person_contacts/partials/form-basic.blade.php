<div class="form-group row">

    <div class="col-md-3">
        <label for="mobile" class="col-form-label">Celular</label>
        <input class="form-control{{ $errors->getBag('validation')->has('mobile') ? ' is-invalid' : '' }} non-anonymous"
               id="mobile"
               name="mobile"
               @if(isset($contact))
               value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile') }}"
               {{--                               v-init:mobile="'{{is_null(old('mobile')) ? $contact->mobile : old('mobile')}}'"--}}
               @else
               value="{{old('mobile') }}"
               {{--                               v-init:mobile="'{{old('mobile')}}'"--}}
               @endif
               autofocus
               v-mask='["(##)####-####", "(##)#####-####"]'
            {{--                               v-model='form.mobile'--}}
        >

        @if ($errors->getBag('validation')->has('mobile'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->getBag('validation')->first('mobile') }}</strong>
                                        </span>
        @endif
    </div>
    <div class="col-md-3">
        <label for="whatsapp" class="col-form-label">Whatsapp</label>
        <input class="form-control{{ $errors->getBag('validation')->has('whatsapp') ? ' is-invalid' : '' }} non-anonymous" name="whatsapp"
               id="whatsapp"
               @if(isset($contact))
               value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp') }}"
               {{--                               v-init:whatsapp="'{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp')}}'"--}}
               @else
               value="{{old('whatsapp') }}"
               {{--                               v-init:whatsapp="'{{old('whatsapp')}}'"--}}
               @endif
               autofocus
               v-mask='["(##)#####-####"]'
            {{--                               v-model='form.whatsapp'--}}

        >

        @if ($errors->getBag('validation')->has('whatsapp'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->getBag('validation')->first('whatsapp') }}</strong>
                                        </span>
        @endif
    </div>
    <div class="col-md-3">
        <label for="email" class="col-form-label">E-mail</label>
        <input type=email class="form-control{{ $errors->getBag('validation')->has('email') ? ' is-invalid' : '' }} non-anonymous" name="email"
               id="email"
               @if(isset($contact))
               value="{{is_null(old('email')) ? $contact->email : old('email') }}"
               @else
               value="{{old('email') }}"
               @endif
               autofocus>

        @if ($errors->getBag('validation')->has('email'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->getBag('validation')->first('email') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="col-md-3">
        <label for="phone" class="col-form-label">Telefone Fixo</label>
        <input class="form-control{{ $errors->getBag('validation')->has('phone') ? ' is-invalid' : '' }} non-anonymous" name="phone"
               id="phone"
               @if(isset($contact))
               value="{{is_null(old('phone')) ? $contact->phone : old('phone') }}"
               {{--                               v-init:phone="'{{is_null(old('phone')) ? $contact->phone : old('phone')}}'"--}}
               @else
               value="{{old('phone') }}"
               {{--                               v-init:phone="'{{old('phone')}}'"--}}
               @endif
               autofocus
               v-mask="['(##) ####-####', '(##) #####-####']"
            {{--                               v-model='form.phone'--}}

        >

        @if ($errors->getBag('validation')->has('phone'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->getBag('validation')->first('phone') }}</strong>
                                        </span>
        @endif
    </div>
</div>
