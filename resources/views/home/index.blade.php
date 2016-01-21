@extends('layouts.master')

@section('contents')
    {!! Form::open(array('url' => 'foo/bar')) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('question', 'Sua pergunta') !!}
            {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sendto', 'Destino') !!}
            {!!
                Form::select('size',
                    [
                        '08000220008' => 'Alô Alerj (Online)',
                        '08002827060' => 'Defesa do Consumidor (Online)',
                        '08002820230' => 'Denúncia Meio Ambiente (Online)',
                        '08002820802' => 'Disque Preconceitos (Online)',
                        '08002826582' => 'Pirataria (Online)',
                        '08002855005' => 'Disque PPD (Online)',
                        '08002828815' => 'Saneamento Ambiental (Online)',
                        '08002823135' => 'Segurança Pública (Online)',
                    ], null, ['class' => 'form-control']
                )
            !!}
        </div>

        <button type="submit" class="btn btn-primary">Entrar no chat</button>
{!! Form::close() !!}

   <form name="lz_login_form" method="post" action="postform" target="lz_chat_frame.3.2" style="padding:0px;margin:0px;" _lpchecked="1">
       {!! csrf_field() !!}
        <table align="center" cellpadding="2" cellspacing="0" width="100%">
            <tbody><tr>
                <td><br></td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <div id="lz_chat_mail_values"><table>
                            <tbody><tr>
                                <td class="lz_chat_form_field" width="150"><strong>Your Name:</strong></td><td width="220"><input name="name" class="lz_chat_login_box" maxlength="32"></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field"><strong>Email:</strong></td><td><input name="email" class="lz_chat_login_box" maxlength="50"></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field">Company:</td><td><input name="company" class="lz_chat_login_box" maxlength="50"></td>
                            </tr>
                            </tbody></table></div>
                    <div id="lz_chat_mail_details" style="display: block;">
                        <table cellpadding="5" cellspacing="3">
                            <tbody><tr>
                                <td class="lz_chat_form_field" width="150"><strong>Your Name:</strong></td><td width="220"><input name="name" id="lz_chat_mail_name" class="lz_chat_mail_box" value="" maxlength="32"><span class="lz_index_red" id="lz_chat_login_mandatory">&nbsp;*</span></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field"><strong>Email:</strong></td><td><input name="email" id="lz_chat_mail_email" class="lz_chat_mail_box" value="" maxlength="50"><span class="lz_index_red" id="lz_chat_login_mandatory">&nbsp;*</span></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field">Company:</td><td><input name="company" id="lz_chat_mail_company" class="lz_chat_mail_box" value="" maxlength="50"></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field">Your Message:</td><td valign="top"><textarea name="text" id="lz_chat_mail_message" class="lz_chat_mail_box"></textarea></td>
                            </tr>
                            <tr>
                                <td class="lz_chat_form_field"><strong>Department:</strong></td>
                                <td valign="middle">
                                    <table cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td><select id="lz_chat_mail_groups"><option value="08002827060">Defesa do Consumidor</option><option value="08000220008">Alô Alerj</option><option value="08002820230">Denúncia Meio Ambiente</option><option value="08002820802">Disque Preconceitos</option><option value="08002826582">Pirataria</option><option value="08002855005">Disque PPD</option><option value="08002828815">Saneamento Ambiental</option><option value="08002823135">Segurança Pública</option></select></td>
                                            <td width="25" align="right">
                                            </td></tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td></td><td height="40"><input type="submit" value="Send message" id="lz_chat_mail_button"></td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td><span class="lz_index_red" id="lz_chat_login_mandatory">* Required Fields</span></td>
                            </tr>
                            </tbody></table>
                    </div>
                </td>
            </tr>
            </tbody></table>
    </form>
@stop
