<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\TurmasController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class,'index']);
Route::get('/horario', [HorarioController::class,'horario']);
Route::get('/turmas', [TurmasController::class,'turmas']);
Route::get('/alunos', [TurmasController::class,'alunosTurma']);
Route::get('/alunos/pdf', [TurmasController::class,'baixarListaDeAlunosEmPdf']);




