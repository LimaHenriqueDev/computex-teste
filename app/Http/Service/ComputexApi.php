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

        $response = Http::get($this->baseUrl . "ws_controller.php?action=getAlunosTurma&ano=" . $params['ano'] . "&escola=" . $params['escola'] . "&grau_serie=" . $params['grau_serie'] . "&turno=" . $params['turno'] . "&turma=" . $params['turma'] . "&status=C")->json();

        return $response;
    }


    private function buscarIcones($opcao)
    {
        $icones = [
            35 => 'far fa-clock',
            36 => 'fas fa-user-graduate',
            37 => 'fas fa-calendar-alt',
            29 => 'fas fa-comment-dots',
            49 => 'fab fa-rocketchat',
            27 => 'fas fa-image',
            '04' => 'fas fa-file-invoice-dollar',
            30 => 'fas fa-file',
            '03' => 'fas fa-id-card',
            '08' => 'fas fa-exclamation',
            10 =>'fas fa-book-open',
            28 => 'fas fa-arrow-alt-circle-right',
            32 => 'fas fa-wallet',
            80 => 'far fa-comment-dots',
            26 => 'far fa-list-alt', 
            81 => 'fas fa-graduation-cap',
            '02' => 'fas fa-database',
            '01' => 'fas fa-key'
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
