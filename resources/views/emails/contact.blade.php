<html>
    <body>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    {{ $data['name'] }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $data['email'] }}
                </td>
            </tr>
            <tr>
                <td>
                    Telefone: {{ $data['telephone'] }}
                </td>
            </tr>
            <tr>
                <td>
                    Tipo: {{ \App\Services\Subject::find($data['subject']) }}
                </td>
            </tr>
            <tr>
                <td>
                    Mensagem: {{ $data['message'] }}
                </td>
            </tr>
        </table>

        <h1>Dados do envio</h1>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            @foreach($data as $key => $datum)
                <tr>
                    <td>
                        {{ $key }}: {{ $datum }}
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
