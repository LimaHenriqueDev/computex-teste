@extends('index')
@section('title', 'Alunos')
@section('content')

<div class="container d-flex justify-content-center">
    <table class="table table-striped text-center table-bordered">
        <thead>
            <tr>
                <th scope="col" >Nome</th>
                <th>Matrícula </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td >
                        {{$aluno['nome']}}
                    </td>
                    <td>
                        {{$aluno['matricula']}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection