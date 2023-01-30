<?php

namespace App\Http\Controllers;

use App\Http\Service\ComputexApi;


class HomeController extends Controller
{
  public function index()
  {
    $computexApi = new ComputexApi();
    $menus = $computexApi->buscarMenus();
    return view('home', compact('menus'));
  }


}
