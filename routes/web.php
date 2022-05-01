<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\PosicaoController;

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

Route::Resources([
    'clube' => ClubeController::class,
    'jogador' => JogadorController::class,
    'posicao' => PosicaoController::class
]);

Route::get('/', function () {
    return view('welcome');
});
