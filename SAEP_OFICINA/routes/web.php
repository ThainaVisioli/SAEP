<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/login', [UsuarioController::class, 'autenticar'])->name('login.autenticar');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::middleware('verificar.login')->group(function (): void {
    Route::get('/principal', fn () => view('principal'))->name('principal');

    Route::prefix('clientes')->name('clientes.')->group(function (): void {
        Route::get('/listar', [ClienteController::class, 'listar'])->name('listar');
        Route::get('/create', [ClienteController::class, 'create'])->name('create');
        Route::post('/', [ClienteController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ClienteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ClienteController::class, 'update'])->name('update');
    });

    Route::prefix('veiculos')->name('veiculos.')->group(function (): void {
        Route::get('/listar', [VeiculoController::class, 'listar'])->name('listar');
        Route::get('/create', [VeiculoController::class, 'create'])->name('create');
        Route::post('/', [VeiculoController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VeiculoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VeiculoController::class, 'update'])->name('update');
    });

    Route::prefix('agendamentos')->name('agendamentos.')->group(function (): void {
        Route::get('/listar', [AgendamentoController::class, 'listar'])->name('listar');
        Route::get('/create', [AgendamentoController::class, 'create'])->name('create');
        Route::post('/', [AgendamentoController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AgendamentoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AgendamentoController::class, 'update'])->name('update');
    });
});
