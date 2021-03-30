<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChaveController;
use App\Http\Controllers\ControleController;
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
/*Autenticador de Usuário*/
Route::middleware('auth')->group(function(){
    /*Página Inicial*/
    Route::get('/',[HomeController::class, 'index'])->name('dashboard');

    /*Rotas de Usuário*/
    Route::get('/cadastrarUser', [UserController::class, 'create'])->name('user.create');
    Route::post('/storeUser', [UserController::class, 'store'])->name('user.store');
    Route::get('/editarUser/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/destroyUser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/userIndex', [UserController::class, 'index'])->name('user.index');
    Route::get('/updateYourSelf', [UserController::class, 'show'])->name('user.show');

    /*Rotas de Chave*/
    Route::get('/cadastrarChave', [ChaveController::class, 'create'])->name('chave.create');
    Route::post('/storeChave', [ChaveController::class, 'store'])->name('chave.store');
    Route::get('/editarChave/{id}', [ChaveController::class, 'edit'])->name('chave.edit');
    Route::put('/updateChave/{id}', [ChaveController::class, 'update'])->name('chave.update');
    Route::delete('/destroyChave/{id}', [ChaveController::class, 'destroy'])->name('chave.destroy');
    Route::get('/chaveIndex', [ChaveController::class, 'index'])->name('chave.index');

    /*Rotas de Controle*/
    Route::get('/pegarChave', [ControleController::class, 'pegar'])->name('controle.pegar');
    Route::get('/devolverChave', [ControleController::class, 'devolver'])->name('controle.devolver');
    Route::post('/retirarChave', [ControleController::class, 'retirar'])->name('controle.retirar');
    Route::post('/entregarChave', [ControleController::class, 'entregar'])->name('controle.entregar');
});

Auth::routes();
