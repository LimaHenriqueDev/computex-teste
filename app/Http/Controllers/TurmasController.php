<?php

namespace App\Http\Controllers;

use App\Http\Service\ComputexApi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TurmasController
{

  public function turmas()
  {
    $computexApi = new ComputexApi();
    $turmas = $computexApi->turmas();
    $menus = $computexApi->buscarMenus();
    return view('turmas', compact( 'menus', 'turmas'));
  }

  public function alunosTurma(Request $request){
    $params = $request->all();
    $computexApi = new ComputexApi();
    $menus = $computexApi->buscarMenus();
    $alunos = $computexApi->buscaAlunoPorTurma($params); 
    
    return view('alunos', compact('menus', 'alunos'));
    
  }

  public function baixarListaDeAlunosEmPdf(Request $request) 
  {
    $params = $request->all();
    $computexApi = new ComputexApi();
    $alunos = $computexApi->buscaAlunoPorTurma($params); 
    
    $pdf = Pdf::loadView('alunosPdf', compact('alunos'));
    return $pdf->download('alunos.pdf');
  }
}
