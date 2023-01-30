<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Http;

class ComputexApi
{
    private $baseUrl;

    function __construct()
    {
        $this->baseUrl = "http://camerascomputex.ddns.net:8080/escola/";
    }


    public function buscarMenus()
    {
        $response = Http
            ::get($this->baseUrl . 'mobile_login.php?matricula=2011004&senha=99999999&token=X&so=ios')
            ->json();
        $menus = $response['menu'];
        // dd($menus);
        $menus = array_map(function ($menu) {
            return [
                'titulo' => $menu['titulo'],
                'icone' => $this->buscarIcones($menu['opc']),
                'rota' => $this->buscaRota($menu['opc']),
            ];
        }, $menus);

        return $menus;
    }

    public function Horario()
    {
        $response = Http::get($this->baseUrl .  'json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211')
            ->json();
        $horarios = $response['horario'];
        //   dd($horarios);

        $horarios = array_map(function ($horario) {
            return [
                'dia' => $horario['dia'],
                'horarios' => $horario['horarios']

            ];
        }, $horarios);

        return $horarios;
    }

    public function turmas()
    {
        $response = Http::get($this->baseUrl . 'ws_controller.php?action=getTurmas&ano=20211')
            ->json();
        // dd($response);
        $turmas = $response;

        $turmas = array_map(function ($turma) {
            return [
                'codigo_escola' => $turma['codigo_escola'],
                'ano' => $turma['ano'],
                'grau_serie' => $turma['grau_serie'],
                'turno' => $turma['turno'],
                'turma' => $turma['turma'],
                'grau_longo' => $turma['grau_longo'],
                'serie_longa' => $turma['serie_longa']
            ];
        }, $turmas);


        return $turmas;
    }

    public function Alunos()
    {
        $response = Http::get($this->baseUrl . 'ws_controller.php?action=getAlunosTurma&a
        no=20211&escola=1&grau_serie=15&turno=M&turma=1&status=C')
            ->json();
        $alunos = $response;
        $alunos = array_map(function ($aluno) {
            return [
                "matricula" => $aluno["matricula"],
                "nome" => $aluno["nome"],
                "sequencia" => $aluno["sequencia"],
                "status" => $aluno["status"],
            ];
        }, $alunos);

        return $alunos;
    }

    public function buscaAlunoPorTurma($params)
    {

        $response = Http::get($this->baseUrl . "ws_controller.php?action=getAlunosTurma&ano=".$params['ano']."&escola=".$params['escola']."&grau_serie=".$params['grau_serie']."&turno=".$params['turno']."&turma=".$params['turma']."&status=C")->json();
        
        return $response;
    }


    private function buscarIcones($opcao)
    {
        $icones = [
            35 => 'far fa-clock',
            36 => 'fas fa-user-graduate'
        ];

        if (!array_key_exists($opcao, $icones)) {
            return '';
        }

        return $icones[$opcao];
    }

    private function buscaRota($opcao)
    {
        $rotas = [
            35 => '/horario',
            28 => '/turmas'
        ];

        if (!array_key_exists($opcao, $rotas)) {
            return '';
        }

        return $rotas[$opcao];
    }
}
