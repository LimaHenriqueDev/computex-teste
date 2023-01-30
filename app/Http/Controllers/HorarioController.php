<?php

namespace App\Http\Controllers;

use App\Http\Service\ComputexApi;

class HorarioController extends Controller
{
    public function horario()
    {
      $computexApi = new ComputexApi();
      $horarios = $computexApi->Horario();
      $menus = $computexApi->buscarMenus();
      return view('horario', compact( 'menus', 'horarios'));
    }
}
