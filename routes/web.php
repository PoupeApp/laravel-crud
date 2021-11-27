<?php

use App\Http\Controllers\AluguelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;

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

Route::get('/', function () {
    return redirect()->route('autores.index');
});

Route::resource('autores', AutorController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::resource('editoras', EditoraController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::resource('generos', GeneroController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::resource('clientes', ClienteController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::resource('livros', LivroController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::resource('alugueis', AluguelController::class,[
    'only'=> ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);






