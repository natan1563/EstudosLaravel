<?php

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

use Illuminate\Http\Request;
use App\Http\Controllers\MeuControlador;
use App\Http\Controllers\ClienteControlador;

Route::get('/', function () {
    return view('welcome');
});

Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');

Route::get('nome', [MeuControlador::class, 'getNome']);
Route::get('idade', [Meucontrolador::class, 'getIdade']);
Route::get('multiplicar/{n1}/{n2}', [MeuControlador::class, 'multiplicar']);

Route::resource('clientes', ClienteControlador::class);

Route::get('options/{opcao?}', function($opcao = null){
    return view('outras.opcoes', compact(['opcao']));
})->name('opcao');

Route::get('bootstrap', function(){
    return view('outras.exemplo');
})->name('bootstrap');