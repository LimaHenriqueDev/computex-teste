<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Http;

class ComputexApi
{
    public function buscarMenus()
    {

        $response = Http
            ::get('http://camerascomputex.ddns.net:8080/escola/mobile_login.php?matricula=2011004&senha=99999999&token=X&so=ios')
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

    // public function horario()
    // {
    //     $response = Http::get('http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211')
    //         ->object();
    //     return view('horario', compact('response'));
    
    // }

    
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
            35 => '/horario'
        ];

        if (!array_key_exists($opcao, $rotas)) {
            return '';
        }

        return $rotas[$opcao];
    }
}
