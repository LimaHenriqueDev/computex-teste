<body>
    <table style="width: 100%;">
        <thead >
            <th style="width:50%;"> Nome </th>
            <th style="width: 50%;"> Matricula </th>
        </thead>
        <tbody style="text-align: center">
            @foreach ($alunos as $key => $aluno)
                <tr>
                    <td style="text-align: left;">
                        {{ $aluno['nome'] }}
                    </td>
                    <td style="text-align: left; padding-left: 150px;">
                        {{ $aluno['matricula'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
