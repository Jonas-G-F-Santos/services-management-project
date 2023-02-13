<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [UserController::class, 'index']);

Route::get('/servicos', [ServiceController::class, 'services']);
Route::get('/novoservico', [ServiceController::class, 'add_service']);
Route::post('/novoservico', [ServiceController::class, 'add_serviceAction']);

Route::get('/clientes', [ClientController::class, 'clients'])->name('clients');
Route::get('/novocliente', [ClientController::class, 'add_client']);
Route::post('/novocliente', [ClientController::class, 'add_clientAction']);

Route::get('/editarcliente/{id?}', [ClientController::class, 'edit_client']);
Route::post('/editarcliente/{id?}', [ClientController::class, 'edit_clientAction']);
Route::get('/deletarcliente/{id?}', [ClientController::class, 'del_client']);



Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginAction']);

Route::get('/cadastro', [UserController::class, 'register']);
Route::post('/cadastro', [UserController::class, 'registerAction']);
Route::get('/deletarconta/{id?}', [UserController::class, 'del_account']);

Route::get('/configuracoes', [UserController::class, 'settings']);
Route::post('/configuracoes', [UserController::class, 'settings_Action']);

Route::get('logout', [UserController::class, 'logout']);