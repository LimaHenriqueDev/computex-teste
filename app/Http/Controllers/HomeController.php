<?php

namespace App\Http\Controllers;

use App\Http\Service\ComputexApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $computexApi = new ComputexApi();
    $menus = $computexApi->buscarMenus();
    return view('home', compact('menus'));
  }

  public function horario()
  {
    $response = Http::get('http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211')
      ->object();
    $computexApi = new ComputexApi();
    $menus = $computexApi->buscarMenus();
    return view('horario', compact('response', 'menus'));
  }
}
