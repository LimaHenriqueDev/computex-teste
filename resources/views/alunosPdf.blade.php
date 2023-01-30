<body>
    <table style="">
        <thead>
            <th> Nome </th>
            <th> Matricula </th>
            </th>
        </thead>
        <tbody>
            @foreach ($alunos as $key => $aluno)
                <tr>
                    <td>
                        {{ $aluno['nome'] }}
                    </td>
                    <td>
                        {{ $aluno['matricula'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
