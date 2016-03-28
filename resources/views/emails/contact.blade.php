<html>
    <body>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    {{ $data['name'] }}
                </td>

                <td>
                    {{ $data['email'] }}
                </td>

                <td>
                    Telefone: {{ $data['phone'] }}
                </td>

                <td>
                    Tipo: {{ \App\Services\Subject::find($data['subject']) }}
                </td>

                <td>
                    Mensagem: {{ $data['message'] }}
                </td>
            </tr>
        </table>
    </body>
</html>
