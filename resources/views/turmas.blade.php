@extends('index')
@section('title', 'Turmas')
@section('H1', 'Turmas')
@section('content')

    <div class="container d-flex justify-content-center">
        <table class="table table-striped text-center table-bordered">

            <thead>
                <tr>
                    {{-- @foreach ($turmas as $turma)
                    <th scope="col">Turma: {{ $turma['turma'] }}</th>
                 @endforeach --}}
                    <th scope="col" >Turma</th>
                    <th scope="col">Codigo da Escola </th>
                    <th scope="col">Ano </th>
                    <th scope="col">Grau/Série</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Grau</th>
                    <th scope="col">Série</th>
                    <th scope="col">Ações</th>




                </tr>
            </thead>
            <tbody>
                @foreach ($turmas as $turma)
                    <tr>
                        <td >
                            {{ $turma['turma'] }}
                        </td>
                        <td>
                            {{ $turma['codigo_escola'] }}
                        </td>
                        <td>
                            {{ $turma['ano'] }}
                        </td>
                        <td>
                            {{ $turma['grau_serie'] }}

                        </td>
                        <td>
                            {{ $turma['turno'] }}

                        </td>
                        <td>
                            {{ $turma['grau_longo'] }}

                        </td>
                        <td>
                            {{ $turma['serie_longa'] }}

                        </td>
                        <td>
                           <a href={{"/alunos?ano={$turma['ano']}&escola={$turma['codigo_escola']}&grau_serie={$turma['grau_serie']}&turno={$turma['turno']}&turma={$turma['turma']}&status=C"}}>  Ver alunos </a> 
                           <a href={{"/alunos/pdf?ano={$turma['ano']}&escola={$turma['codigo_escola']}&grau_serie={$turma['grau_serie']}&turno={$turma['turno']}&turma={$turma['turma']}&status=C"}}>  Baixar alunos </a> 

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection
