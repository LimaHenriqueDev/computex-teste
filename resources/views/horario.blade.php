@extends('index')
@section('title', 'Horario')
@section('H1', 'Horário')
@section('content')

    <div class="container d-flex justify-content-center">
        <table class="table table-striped text-center table-bordered">

            <thead>
                <tr>
                    @foreach ($horarios as $horario)
                        <th scope="col">{{ $horario['dia'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($horarios as $horario)
                        <td>
                            @foreach ($horario['horarios'] as $key => $aula)
                                <div class="d-flex flex-column text-center">
                                    <div>
                                        {{ $aula['disciplina'] }}
                                    </div>
                                    <div>
                                        {{ $aula['professor'] }}
                                    </div>
                                </div>

                                @if (count($horario['horarios']) - 1 !== $key)
                                    <hr />
                                @endif
                            @endforeach

                        </td>
                    @endforeach

                </tr>
            </tbody>

        </table>

    </div>



@endsection
