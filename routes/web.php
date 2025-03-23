<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);

// Rotas de Autenticação (apenas para usuários não autenticados)
Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'showLoginForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

// Logout (apenas para usuários autenticados)
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas protegidas (apenas usuários autenticados podem acessar)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/curriculos', [CurriculoController::class, 'index'])->name('curriculos.index');
    Route::get('/curriculos/create', [CurriculoController::class, 'create'])->name('curriculos.create');
    Route::post('/curriculos', [CurriculoController::class, 'store'])->name('curriculos.store');
    Route::get('/curriculos/{curriculo}/edit', [CurriculoController::class, 'edit'])->name('curriculos.edit');
    Route::put('/curriculos/{curriculo}', [CurriculoController::class, 'update'])->name('curriculos.update');
    Route::delete('/curriculos/{curriculo}', [CurriculoController::class, 'destroy'])->name('curriculos.destroy');
});

Route::get('/teste-auth', function () {
    return Auth::check() ? 'Usuário está autenticado ✅' : 'Usuário NÃO está autenticado ❌';
});
