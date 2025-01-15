<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::prefix('clientes')->name('clientes.')->group(function () {
        Route::middleware('permission:visualizar')->group(function () {
            Route::get('/list', [ClienteController::class, 'index'])->name('list');
        });

        Route::middleware('permission:cadastrar')->group(function () {
            Route::get('/create', [ClienteController::class, 'create'])->name('create');
            Route::post('/store', [ClienteController::class, 'store'])->name('store');
        });

        Route::middleware('permission:editar')->group(function () {
            Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ClienteController::class, 'update'])->name('update');
        });

        Route::middleware('permission:deletar')->group(function () {
            Route::delete('/destroy/{id}', [ClienteController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('casas')->name('casas.')->group(function () {
        Route::middleware('permission:visualizar')->group(function () {
            Route::get('/list', [CasaController::class, 'index'])->name('list');
        });

        Route::middleware('permission:cadastrar')->group(function () {
            Route::get('/create', [CasaController::class, 'create'])->name('create');
            Route::post('/store', [CasaController::class, 'store'])->name('store');
        });

        Route::middleware('permission:editar')->group(function () {
            Route::get('/edit/{id}', [CasaController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [CasaController::class, 'update'])->name('update');
        });

        Route::middleware('permission:deletar')->group(function () {
            Route::delete('/destroy/{id}', [CasaController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('apartamentos')->name('apartamentos.')->group(function () {
        Route::middleware('permission:visualizar')->group(function () {
            Route::get('/list', [ApartamentoController::class, 'index'])->name('list');
        });

        Route::middleware('permission:cadastrar')->group(function () {
            Route::get('/create', [ApartamentoController::class, 'create'])->name('create');
            Route::post('/store', [ApartamentoController::class, 'store'])->name('store');
        });

        Route::middleware('permission:editar')->group(function () {
            Route::get('/edit/{id}', [ApartamentoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ApartamentoController::class, 'update'])->name('update');
        });

        Route::middleware('permission:deletar')->group(function () {
            Route::delete('/destroy/{id}', [ApartamentoController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('lotes')->name('lotes.')->group(function () {
        Route::middleware('permission:visualizar')->group(function () {
            Route::get('/list', [LoteController::class, 'index'])->name('list');
        });

        Route::middleware('permission:cadastrar')->group(function () {
            Route::get('/create', [LoteController::class, 'create'])->name('create');
            Route::post('/store', [LoteController::class, 'store'])->name('store');
        });

        Route::middleware('permission:editar')->group(function () {
            Route::get('/edit/{id}', [LoteController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [LoteController::class, 'update'])->name('update');
        });

        Route::middleware('permission:deletar')->group(function () {
            Route::delete('/destroy/{id}', [LoteController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('vendas')->name('vendas.')->group(function () {
        Route::get('/fetch-imoveis', [VendaController::class, 'fetchImoveis'])->name('fetch.imoveis');

        Route::middleware('permission:visualizar')->group(function () {
            Route::get('/list', [VendaController::class, 'index'])->name('list');
        });

        Route::middleware('permission:cadastrar')->group(function () {
            Route::get('/create', [VendaController::class, 'create'])->name('create');
            Route::post('/store', [VendaController::class, 'store'])->name('store');
        });

        Route::middleware('permission:editar')->group(function () {
            Route::get('/edit/{id}', [VendaController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [VendaController::class, 'update'])->name('update');
        });

        Route::middleware('permission:deletar')->group(function () {
            Route::delete('/{venda}', [VendaController::class, 'destroy'])->name('destroy');
        });
    });
});
