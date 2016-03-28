<html>
    <body>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    {{ $input['name'] }}
                </td>

                <td>
                    {{ $input['e-mail'] }}
                </td>

                <td>
                    Telefone: {{ $input['phone'] }}
                </td>

                <td>
                    Tipo: {{ \App\Services\Subject::find($input['subject']) }}
                </td>

                <td>
                    Mensagem: {{ $input['message'] }}
                </td>
            </tr>
        </table>
    </body>
</html>
